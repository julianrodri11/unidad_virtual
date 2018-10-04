<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Documento sin título</title>
<script src="jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 

</head>
<body>

<?php 
if(empty($_GET["id"]))
{
	echo "Por Favor envie el id del banner a mostrar ";}else{
	if(ctype_digit($_GET["id"]))
    {
		$id=$_GET["id"];
		include("funcionbanner.php");
		$con=new funcionbanner();
		$con->conectar();
		$con->eti_mostrarTodos("$id","");
	}else echo"El campo debe banner debe ser numerico";
}?>


</body>
</html>