<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 
        <?php
        error_reporting(0);
        ini_set(“display_errors”, 0 );
        // Verificar se foi enviando dados via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = (isset($_POST["id"]) && $_POST["id"] != null ) ? $_POST["id"] : "";
            $nome = (isset($_POST["nome"]) && $_POST["nome"] != null ) ? $_POST["nome"] : "";
            $celular = (isset($_POST["celular"]) && $_POST["celular"] != null ) ? $_POST["celular"] : "";            
            $nasc = (isset($_POST["nasc"]) && $_POST["nasc"] != null ) ? $_POST["nasc"] : "";
            $cidade = (isset($_POST["cidade"]) && $_POST["cidade"] != null ) ? $_POST["cidade"] : "";
            $endereco = (isset($_POST["endereco"]) && $_POST["endereco"] != null ) ? $_POST["endereco"] : "";
        } else if (!isset($id)){
            $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
        }
        // Cria conexao com o banco de dados
        try{
            $conexao = new PDO("mysql:host=localhost; dbname=des", "root","");
            $conexao-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("set names utf8");
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
        //Bloco if que salva os dados no banco atua como create e update
        if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != ""){
            try{
                if ($id != ""){
                    $stmt = $conexao->prepare("UPDATE contatos SET nome=?, celular=?, nasc=?, cidade=?, endereco=? WHERE id = ?");
                    $stmt->bindParam(6, $id);
                }else{
                $stmt = $conexao->prepare("INSERT INTO contatos (nome, celular, nasc, cidade, endereco) VALUES (?, ?, ?, ?, ?)");
                }
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $celular);
                $stmt->bindParam(3, $nasc);
                $stmt->bindParam(4, $cidade);
                $stmt->bindParam(5, $endereco);
                
                if ($stmt->execute()){
                    if ($stmt->rowCount() > 0){
                        echo "Dados cadastrados com sucesso!";
                            $id = null;
                            $nome = null;                            
                            $celular = null;
                            $nasc = null;
                            $cidade = null;
                            $endereco = null;
                        } else {
                            echo "Erro ao tentar efetivar cadastro";
                        }
                    } else{
                        throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    }
                
                } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
            }
            
        }
        //bloco if que recupera as informações no formulario, etapa utilizada pelo update
        if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != ""){
            try {
                $stmt = $conexao->prepare("SELECT * FROM contatos WHERE id =?");
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                if($stmt->execute()){
                    $rs = $stmt->fetch(PDO::FETCH_OBJ);
                    $id = $rs->id;
                    $nome = $rs->nome;
                    $celular = $rs->celular;
                    $nasc = $rs->nasc;
                    $cidade = $rs->cidade;
                    $endereco = $rs->endereco;
                }else{
                    throw new PDOException("Erro: Não foi possível executar a declaração sql");
                }
            } catch (PDOException $erro) {
                echo "Erro: ".$erro->getMessage();                
            }
        }
        //bloco if utilizando pela etapa delete
        if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != ""){
            try{
                $stmt = $conexao->prepare("DELETE FROM contatos WHERE id = ?");
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                if ($stmt->execute()){
                    echo "Registro foi excluido com êxito";
                    $id = null;
                }else {
                    throw new PDOException("Erro: Não foi possível executar a declaração sql");
                }
            } catch (PDOException $erro) {
                echo "Erro: ".$erro->getMessage();
            }
        }
        ?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recuperação desenvolvimento</title>
        <script type="text/javascript">
        function validaCampo()
        {
        if(document.cadastro.nome.value=="")
	{	
	alert("O Campo nome é obrigatorio!");
	return false;
        }
        else
        if(document.cadastro.celular.value=="")
	{
	alert("Digite um telefone!");
	return false;
	}
        else
        return true;
        }        
</script>  
    </head>
    <body>
        <form action="?act=save" method="POST" name="cadastro" id="cadastro" onsubmit="return validaCampo(); return false;">
            
            <h1>desenvolvimento - contatos</h1>
            <hr>
            <input type="hidden" name="id" <?php 
            if (isset($id) && $id != null || $id != ""){
                echo "value=\"{$id}\"";
            }
            ?>/>
            Nome:
            <input type="text" name="nome" <?php 
            if (isset($nome) && $nome != null || $nome != ""){
                echo "value=\"{$nome}\"";
            }
            ?>/>
            celular:
            <input type="number" name="celular" <?php 
            if (isset($celular) && $celular != null || $celular != ""){
                echo "value=\"{$celular}\"";
            }
            ?>/>
            data de nascimento:
            <input type="text" name="nasc" <?php 
            if (isset($nasc) && $nasc != null || $nasc != ""){
                echo "value=\"{$nasc}\"";
            }
            ?>/>
            cidade:
            <input type="text" name="cidade" <?php 
            if (isset($cidade) && $cidade != null || $cidade != ""){
                echo "value=\"{$cidade}\"";
            }            
           
            ?>/>
            endereço:
            <input type="text" name="endereco" <?php 
            if (isset($endereco) && $endereco != null || $endereco != ""){
                echo "value=\"{$endereco}\"";
            }            
           
            ?>/>
            
            
            
            <input type="submit" value="salvar" />
            <input type="reset" value="Novo" />
            <hr>
        </form>
        
        <table border="1" width="100%">
            <tr>
                <th>Nome</th>
                <th>celular</th>
                <th>nascimento</th>
                <th>ações</th>
                <th>cidade</th>                
                <th>endereço</th>                
            </tr>
            <?php
            try{
                $stmt = $conexao->prepare("SELECT * FROM contatos");
                if($stmt->execute()){
                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo "<tr>";
                        echo "<td>".$rs->nome."</td><td>".$rs->celular."</td><td>".$rs->nasc."</td><td><center><a href=\"?act=upd&id=" . $rs->id . "\">[Alterar]</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                ."<a href=\"?act=del&id=".$rs->id."\">[Excluir]</a></center></td><td>".$rs->cidade."</td><td>".$rs->endereco."</td>";
                        echo "</tr>";
                    }
                }else{
                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
            } catch (PDOException $erro) {
                echo "Erro: ".$erro->getMessage();
            }
            
            ?>            
        </table>
    </body>
</html>
