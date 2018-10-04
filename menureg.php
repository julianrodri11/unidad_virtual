<?php
session_start();
 //Validar si se está ingresando con sesión correctamente

empty($_SESSION['tipoUsu']);	

//	$usuario=$con->session($corr,$tipo);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Menu</title>
<link rel="stylesheet" type="text/css" href="menu.css" />
</head>

<body>

<center>
<div id="contenedor" >

	<div class="men" id="uno" style="100%"><div class="texto"><a href="formulario.php">Registro de Usuarios</a></div></div>
	<div class="men" id="dos" style="100%"><div class="texto"><a href="modusu.php">Modificar Usuarios</a></div></div>
	<div id="linea"></div>
	<div id="cerrar"><?php if (!$_SESSION){}else{ ?><center><a href="cerrar.php">Salir</a><?php }?></center></div>
</div>

</body>
</html>
