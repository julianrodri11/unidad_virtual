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
<title>Galeria de imagenes para etiquetas</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="banner.css"/>
<center><h2>Galeria de imagenes para etiquetas</h2></center>
<?php 
/*conexion*/
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase

$consulta=mysql_query("select * from eti_imagen");
while($filas=mysql_fetch_array($consulta)){
		$ruta=$filas['imagen'];
		
?>
<div id="contImg" ><img src="./imagenes/eti_imagen/<?php echo $ruta; ?>" border="1"   width="100%" height="70" >
</div>



<?php }?>
</body>
</html>

<?php }else{echo "<center>No tienes privilegios para hacer esto ";
//	echo '//<br><a href="loguin.php">Iniciar session</a>';
}
}?>