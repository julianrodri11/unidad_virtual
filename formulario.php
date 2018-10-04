<!--script language="Javascript">setTimeout("location.href='loguin.php'", 3000);</script-->
<?php
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar(); 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrar Usuario</title>
</head>
<link type="text/css" rel="stylesheet" href="registro.css">

<body>
	<div id="content"></div>
	<div id="franamarilla"></div>
	<div id="adorchur"></div>
	<div id="frm"><form method="post" action="registro.php">
  <table width="200" border="0" cellspacing="1" cellpadding="1" align="center">
    <tr>
      <td colspan="2">Registro De Usuarios</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Cedula:</td>
      <td><input class="txtforms" name="txtCed" type="number" required="required" id="txtCed" placeholder="000000000" max="9999999999" tabindex="1" title="Se requiere su identificación"></td>
    </tr>
    <tr>
      <td>Nombres:</td>
      <td><input class="txtforms" name="txtNom1" type="text" required="required" id="txtNom1" tabindex="2" title="letras con _" pattern="\S{5,50}" maxlength="50" placeholder="Nombre1_Nombre2" ></td>
    </tr>
      <td>Apellidos:</td>
      <td><input class="txtforms" name="txtApe1" type="text" required="required" id="txtApe1" list="Docente" tabindex="3" title="Su primer apellido es obligatorio" pattern="\S{5,50}" maxlength="50" placeholder="Apellido1_Apellido2" ></td>
    </tr>
    <tr>
      <td>Celular:</td>
      <td><input class="txtforms" name="txtCel" type="number" id="txtCel" tabindex="4" max="9999999999" placeholder="3100000000"></td>
    </tr>
    <tr>
      <td>Correo:</td>
      <td><input class="txtforms" name="txtCor" type="email" required="required" id="txtCor" tabindex="5" autocomplete="off" placeholder="correo@umariana.edu.co" title="Su Correo es obligatorio" maxlength="100"></td>
    </tr>
    <tr>
      <td>Programa:</td>
      <td><input class="txtforms" name="txtFac" type="text" id="txtFac" tabindex="6" title="Por favor ingresa el programa al que perteneces" maxlength="50" pattern="\S{5,50}" required placeholder="ing_xxxxx"></td>
    </tr>
    <tr>
      <td><input  name="Guardar" type="submit" id="button" tabindex="11" value="Guardar"></td>
      <td><input  name="button" type="reset" id="button" tabindex="12" value="Cancelar"></td>
    </tr>
    <tr>
    	<td colspan="2" ><a href="menureg.php">Atras</a></td>
      	
    </tr>
  </table>
  
  </form></div>



</body>
</html>
