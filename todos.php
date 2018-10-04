<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Documento sin título</title>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 
</head>
<?php 
if(empty($_GET["id"]) && (ctype_digit($_GET["id"])))
{
?>

<body>
<?php 

	echo "Por Favor envie el id del banner a mostrar ";}else{
	if(ctype_digit($_GET["id"]))
    {
		$id=$_GET["id"];
		include_once("funcionbanner.php");
		$con=new funcionbanner();
		$con->conectar();
		
		$consulta=mysql_query("SELECT banners.*,fuentes.fuente as f,fuentes.categoria FROM banners INNER JOIN fuentes ON(banners.fuente=fuentes.id) where banners.id='$id'");
		while($filas=mysql_fetch_array($consulta)){
		$id=$filas['id'];
		$fuente=$filas['f'];
		$fuente2=str_replace("+"," ",$fuente);
		$categorita=$filas['categoria'];
		$tamano=$filas['tamano'];
	    $color=$filas['color'];
	}
		$con->mostrarTodos("$id","");
		?>
		<style>
        #titCurso
        {
        font-family: '<?=$fuente2?>', <?= $categorita?>;
        font-size:<?=$tamano?>px;
        color:#<?=$color?>;
        }
        </style>		
		<?php
	echo"<style>@import url(http://fonts.googleapis.com/css?family=".$fuente.");</style>";
	}else echo"El campo debe banner debe ser numerico";
	
}?>
<div id="msg"></div>

</body>
</html>