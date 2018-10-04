<?php
session_start();
if (!$_SESSION)
{echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "login.php"
</script>';
}else{
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
	$corr=$_SESSION['correoUsu'];
	$tipo=$_SESSION['tipoUsu'];	
	$usuario=$con->session($corr,$tipo);
	if(($usuario=="siexiste" && $tipo=="Administrador") || $tipo=="Docente" )
	{	?><?php 
	if(empty($_GET["varTit"]) )
	{	echo"Parametros vacios";	}
	else 	
	{ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Opciones de etiqueta</title>
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efecto.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 
</head>
<body id="bodybanner">

<?php 

$idBanner=$_GET['varTit'];

$con->eti_mostrar($idBanner);
?>
 
 <div id="menImg" ></div>
 <div id="btn">GENERAR CODIGO HTML</div>
 <div id="oculto" >Copia y pega este código en el lugar donde quieras mostrarlo en tu página<br> 
	<textarea rows="7" cols="45" ><iframe src="http://virtual.umariana.edu.co/etiquetas/eti_todos.php?id=<?php echo $idBanner;?>" noresize scrolling="no" width="40%" height="100"  frameborder="0"></iframe></textarea>
 </div>
 
<div id="contOpc">
    <div class="opci"  id="camTit" >Modifique el titulo de la Etiqueta<br>Maximo 50 caracteres.
      <?php $con->buscar("titulo","etiquetas",$idBanner);  ?>  
      </div>
    
    <div class="opci"  id="camImF" >Seleccione la imagen de la Etiqueta<br>Haga click en la imagen que desea para su etiqueta <br>
		<?php $con->buscar("imagen","eti_imagen",$idBanner);  ?>  
     </div>  	    
     	
</div>
    
</body>
</html>
    <?php } 
}else{echo"<center>No ha iniciado session<br><a href='login.php'>Inicio</a>";}
}?>
