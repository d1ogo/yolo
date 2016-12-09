
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cadastro de novos carros</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8; charset=iso-8859-1"  />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<!--Fireworks CS6 Dreamweaver CS6 target.  Created Tue Nov 29 23:26:38 GMT-0400 2016-->
</head>
    
    <body>
<form action="save.php" method="post" enctype="multipart/form-data">

<table>
<tr>
      <td>Marca:</td>
      <td><input type="text" name="marca"></td>
</tr>
<tr>
      <td>modelo:</td>
      <td><input type="text" name="model"></td>
</tr>
<tr>
      <td>ano de fabricação:</td>
      <td><input type="int" name="ano"></td>
</tr>
<tr>
      <td>quantidade de portas:</td>
      <td><input type="number" name="portas"></td>
</tr>
<tr>
      <td>Potencia do motor:</td>
      <td><input type="number" name="cavalos"></td>
</tr>
    
<tr>
      <td>cor:</td>
      <td><input type="text" name="cor"></td>
</tr>
    
    
<tr>
      <td>tipo de vidro:</td>
      <td><input type="radio" name="vidro" value="manual" checked>vidro manual<br>
          <input type="radio" name="vidro" value="elet">Vidro elétrico
      </td>
</tr>
<tr>
      <td>Tipo de direcao:
      <td><input type="radio" name="direcao" value="mecanica" checked>direcao mecânica<br>
          <input type="radio" name="direcao" value="hidra">direcao hidráulica
      </td>
</tr>
<tr>
    
    <td>Tipo de automóvel:
            <input type="radio" name="tipo" value="passeio" checked>Carro de passeio<br>
                <input type="radio" name="tipo" value="suv">SUV<br>
                <input type="radio" name="tipo" value="caminho">caminhonete<br>
                <input type="radio" name="tipo" value="carreta">carreta<br>
                <input type="radio" name="tipo" value="caminhao">caminhão<br>
                <input type="radio" name="tipo" value="furgao">furgão<br>
            <input type="radio" name="tipo" value="pick">pickup
                
      </td>
    
</tr>
        
<tr>
      <td>valor do automóvel:</td>
      <td><input type="number" name="valor"></td>
</tr>

<tr>
      <td>Imagem:</td>
      <td>
          <input type="file" name="arquivo" />
        
      </td>
</tr>
<tr>
     <td><input type="submit" name="btnSubmit" value="Enviar"></td>
</tr>
</table>
</form>

</body>
</html>
    