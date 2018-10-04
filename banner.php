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
	{	?>
	
	<?php 
	if(empty($_GET["varTit"]) )
	{	echo"Parametros vacios";	}
	else 	
	{ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edición </title>

<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efecto.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 
</head>

<body id="bodybanner">
<h2>Modifique su banner</h2>
<?php 
 $idBanner=$_GET['varTit'];
//$idBanner=25;
$con->mostrar($idBanner);
?>

 <div id="menImg" ></div> 
 <div id="btn">GENERAR CODIGO HTML</div><br><br>
 <div id="oculto" >Copia y pega este código en el lugar donde quieras mostrarlo en tu página<br> 
	<textarea rows="7" cols="45" ><iframe src="http://virtual.umariana.edu.co/etiquetas/todos.php?id=<?php echo $idBanner;?>" noresize scrolling="no" width="100%" height="200" frameborder="0"></iframe></textarea>
 </div>
 
 
<div id="contOpc">
    <div class="opci"  id="camTit" >Modifique el titulo del banner
      <?php $con->buscar("titulo","banners",$idBanner);  ?>  
      </div>

    <div class="opci"  id="camImF" >Seleccione la imagen del banner<br>Haga click en la imagen que desea para su banner <br>
		<?php $con->buscar("imagen","imagen",$idBanner);  ?>  
     </div>  	    
     
    <div class="opci"  id="camImC" >Seleccione el fondo del banner<br>Haga click en la imagen que desea para su banner <br>
       	<?php $con->buscar("fondo","fondo",$idBanner);  ?>  
    </div>
    
    <div class="opci"  id="camFuL" >Opciones personalizadas<br><br>       	 
    	<?php $con->buscar("fuente","fuentes",$idBanner);  ?>        
    </div>
    	
</div>
<!--a href="listarbanners.php">Editar otro banner</a--><br>
    	
</body>
</html>
    <?php } 
}else{echo"<center>No ha iniciado session<br><a href='login.php'>Inicio</a>";}
}?>
