<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>
<link type="text/css" rel="stylesheet" href="contrasena.css">
</head>
<body>
<?php
	include_once("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar(); 
	
  	$ced=$con->tildes($_POST['ced']);
	$cor=$con->tildes($_POST['cor']);
	if(!is_int($ced) && $ced>1 && strlen($ced)<"12" && strlen($cor)<"98" && filter_var($cor, FILTER_VALIDATE_EMAIL))
	{//echo"los datos cumplen";
	
	
	 $con = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE idPer='$ced'"));
	 $cedu=$con['idPer'];	
	//saco la cedula y el correo y si no coinciden no envio el email
	 $corr=$con['corPer'];
	 $cont=$con['conPer'];
 	 $tipo=$con['tipPer'];	
	//comparo datos
	if($ced==$con['idPer'] && $cor==$corr)
	{	
	session_start();
	$_SESSION['correoUsu']=$corr;	$_SESSION['tipoUsu']=$tipo;		$_SESSION['cedula']=$ced;	
	//	$usuario=$con->session($corr,$tipo);
	if( $_SESSION['tipoUsu']=="SuperUserAdmin" || $_SESSION['tipoUsu']=="Docente" || $_SESSION['tipoUsu']=="Administrador"){
echo"<center style='color:green'><br><br>Datos correctos<br>puede actualizar su contrseña</center>";
?>	<div>
    <table width="200" border="0" align="center">
      <tr>
        <td><label for="txtCed">Nueva Contraseña:<br>
        </label>
          <input type="password" name="txtCed" id="txtPw1"></td>
        </tr>
      <tr>
        <td>Repita Contraseña:</td>
        </tr>
      <tr>
        <td><input type="password" name="txtCor" id="txtPw2"></td>
        </tr>
      <tr>
        <td><input type="button" name="submit" id="submit" value="Enviar" onClick="restaurarcon()"></td>
        </tr>
    </table>
	</div>
    <div id="respuesta"></div>
<?php

		
	}else{
	      echo"<CENTER><br><br>NO TIENES PRIVILEGIOS PARA HACER ESTO</center>";
		}
/*	}*/
	
	////////////////////////////FIN SESION
	}
	else
	{echo"<center style='color:red;'><strong>Verifica tu informacion</strong><br> alguno de los datos no es existe en el sistema";}

	
	
?>

<?php 
}else{echo"<center style='color:red;'><strong>Verifica tu información</strong><br>El campo cedula debe ser entero <br>verifica si tu correo esta bien ";}//fin else de validaciones
?>
</body>
</html>
