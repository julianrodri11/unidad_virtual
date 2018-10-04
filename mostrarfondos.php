<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mostrar Fondos</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="banner.css"/>
<center><h2>GALERIA DE IMAGENES</h2></center>
<?php 
/*conexion*/
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase

$consulta=mysql_query("select * from fondo");
while($filas=mysql_fetch_array($consulta)){
		$ruta=$filas['fondo'];
		
?>

<!--div id="cont"-->

<!--div align="center">< ?php echo $titulo;? ></div-->
<div id="contImg" ><img src="./imagenes/fondos/<?php echo $ruta; ?>" border="1"  width="100%" height="150" >
<!--div align="center">< ?php echo $desc;? ></div--></div>



<?php }?>
</body>
</html>