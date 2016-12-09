
<?php 
session_start();
$host= 'localhost';
$bd= 'crudsimples';
$senhabd= '';
 
$userbd = $bd; 

 // Cria conexao com o banco de dados
        try{
            $con = new PDO("mysql:host=localhost; dbname=crudsimples", "root","");
            $con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec("set names utf8");
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
        $login = $_POST['login'];
$senha	= $_POST ['senha'];


 $query = "INSERT INTO `usuario` ( `nome` , `senha`) 
VALUES ('$login', '$senha')";
 
 
echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
?> 