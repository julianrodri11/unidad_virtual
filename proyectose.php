<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Proyectos Creados</title>
<link rel="stylesheet" type="text/css" href="banner.css"></link>
</head>
<body>
<center><h2>Lista de Etiquetas Creadas En La Aplicación</h2></center>
<br>
<?php
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
//	$con->eti_mostrarTodos("adminroot","");	
	$consulta=mysql_query("SELECT  `etiquetas`.`id` FROM etiquetas ");	
	while($filas=mysql_fetch_array($consulta))
	{
	$id=$filas['id'];
	?>
    <iframe src="eti_todos.php?id=<?php echo $id; ?>" noresize scrolling="no" id="content" frameborder="0"></iframe>
	<?php
	}

?>
<!--a href="eti_index.php">Menu Principal Etiquetas</a-->
</body>
</html>