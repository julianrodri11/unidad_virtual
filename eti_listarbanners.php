<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "loguin.php"
</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista de banners</title>
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link>
</head>
<body>
<center>
<div id="limpiarbtnb">
Nombre del título a buscar<br>
<input type="text" id="txtBus" placeholder="Buscar" onKeyUp="eti_buscardatos('etiquetas','<?php echo $ced; ?>')">
</div>
<div id="menImg"></div><br>

<div id="listar_datos">
<?php
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();
if($tipo=="Administrador")
{
	$sql="SELECT * FROM etiquetas";
	$con->listar("etiquetas",$sql);
//	$con->eti_mostrarTodos("adminroot",$ced);	

}else if($tipo =="Docente")
{
	$sql="SELECT * FROM etiquetas WHERE idPer=$ced";	
	$con->listar("etiquetas",$sql);
	$var="docente";
//	$con->eti_mostrarTodos($var,$ced);	

}
?></div>
</body>
</html>
<?php }else{echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';}

}?>