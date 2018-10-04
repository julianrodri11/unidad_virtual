<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proyectos Creados</title>
<link rel="stylesheet" type="text/css" href="banner.css"></link>
</head>
<body>
<center><h2>Lista de Banners Creados En La Aplicación</h2></center>

<?php
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
	$consulta=mysql_query("SELECT  `banners`.`id` FROM banners ");	
	while($filas=mysql_fetch_array($consulta))
	{
	$id=$filas['id'];
	?>
    <iframe src="todos.php?id=<?php echo $id; ?>" noresize scrolling="no" id="content" frameborder="0"></iframe>
	<?php
	}
	


?>
<!--a href="index.php">Menu Principal de Banners</a-->
</body>
</html>
