
<!--SCRIPT PHP PARA INCLUSÃO NO BANCO

                <th>marca</th>
                <th>modelo</th>
                <th>ano</th>
                <th>cor</th>
                <th>Portas</th>
                <th>Vidro</th> este
                <th>Direção</th> este                
                <th>Tipo</th> este
                <th>Cavalos</th>    
                <th>Valor</th>
                <th>Imagem</th>  
tipo
-->
    <?php
    if (isset($_POST["btnSubmit"])) {
        if (isset($_POST["vidro"])) {
        $answer = $_POST['vidro'];
           if ($answer == "manual") {
               $vido = "manual";
               echo "manual";
           } else {
               $vido = "eletrico";
               echo "eletrico";
           }    
        
      }}
      if (isset($_POST["btnSubmit"])) {
        if (isset($_POST["direcao"])) {
        $answer = $_POST['direcao'];
           if ($answer == "mecanica") {
               $direc = "mecanica";
               echo "mecanica";
           } else {
               $direc = "hidraulica";
               echo "hidraulica";               
           }               
           }    
       
      }if (isset($_POST["btnSubmit"])) {
        if (isset($_POST["tipo"])) {
        $answer = $_POST['tipo'];
           if ($answer == "passeio") {
               $tip = "passeio";
               echo "passeio";
           } else if($answer == "suv"){
               $tip = "suv";
               echo "suv";
           } else if($answer == "caminho"){
               $tip = "caminhoneta";
               echo "caminhoneta";
           }   else if($answer == "carreta"){
               $tip = "carreta";
               echo "carreta";
           }   else if($answer == "caminhao"){
               $tip = "caminhao";
               echo "caminhao";
           }   else if($answer == "furgao"){
               $tip = "furgao";
               echo "furgao";
           }   else if($answer == "pick"){
               $tip = "pickup";
               echo "pickup";
      }}}
//conexao bd
$con = mysql_connect("localhost", "root", "") or die ("Sem conexão com o servidor");
$select = mysql_select_db("crudsimples") or die("Sem acesso ao DB");

//dados que serão incluidos
$marca=$_POST['marca'];
$modelo=$_POST['model'];
$ano=$_POST['ano'];
$portas=$_POST['portas'];
$caorvalos=$_POST['cavalos'];
$cor=$_POST['cor'];
$vidro=['vido'];
$direcao=['direc'];
$tipo=['tip'];
$valor=$_POST['valor'];


//nome da pasta onde vao ficar armazenados os arquivos
$pasta = "../uploads";
$sql = "INSERT INTO teste (marca,modelo,cor,ano,portas,vidro, direcao,cavalos,tipo,valor,image)"
        . " VALUES ('$marca', '$modelo', '$cor', '$ano', '$portas','','','$caorvalos','',"
        . ",'$valor','')";

/**
if($_FILES['arquivo']['tmp_name'])
{
    $marca = $_FILES['arquivo']['name'];
    if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $pasta."/".$marca))
    {
        echo "Arquivo $marca movido para $pasta ";
    }
    else
    {
        echo "Falha ao mover arquivo";
    }
}

$sql = "INSERT INTO tab_filmes (nome, nome_orig, natio, ano, binarioFoto, tipoFoto) VALUES ('$marca', '$nome_orig', '$natio', '$ano', '$foto_filme', '$tipo_foto_filme')";

//conexão com o banco de dados

$con=mysql_connect("localhost", "root") or die ("Configuração de Banco de Dados Errada!");

//Selecionando o banco de dados...

mysql_select_db("filmes") or die ("Banco de Dados Inexistente!");

//Inserindo os dados

mysql_query($sql, $con) or die ("<font style=Arial color=red><h1>Houve um erro na gravação dos dados</h1></font>");

echo "<font style=Arial color=green><h1>Cadastro efetuado com sucesso!</h1></font>";
*/
?>
