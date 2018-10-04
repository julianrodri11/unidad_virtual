
<link rel="stylesheet" type="text/css" href="banner.css"/>
<center><h2>GALERIA DE DISEÑOS</h2>
<center></center>
<?php 
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase

$consulta=mysql_query("select * from imagen");
while($filas=mysql_fetch_array($consulta)){
		$ruta=$filas['imagen'];
?>

<!--div id="cont"-->

<!--div align="center">< ?php echo $titulo;? ></div-->
<div id="contImg" ><img src="./imagenes/cursos/<?php echo $ruta; ?>"  border="1"  width="100%" height="150" >
<!--div align="center">< ?php echo $desc;? ></div--></div>



<?php }?></center>