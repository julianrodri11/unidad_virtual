<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "login.php"
</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>

<script src="jquery-1.11.0.min.js"></script>
<!--script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script-->
<!--script type="text/javascript" src="efecto.js"></script-->
<script type="text/javascript" src="efectopciones.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 


<center>
<body  >
Nombre del título a buscar<br>
<input type="text" id="txtBus" style="color:#000;" placeholder="Buscar" onKeyUp="buscardatos('banners')">

<div id="menImg"></div><br><br><br>
</body>

<?php }else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="login.php">Iniciar session</a>';
	
	}}?>