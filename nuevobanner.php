<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "loguin.php"
</script>';
}else{

	$corr=$_SESSION['correoUsu'];
	$tipo=$_SESSION['tipoUsu'];	
	$ced=$_SESSION['cedula'];	
//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Nuevo Banner</title>
<script src="jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 
</head>
<body id="bodytitulo">

<?php 

//<!--center><h3>CREAR NUEVO BANNER</h3></center-->
/*conexion*/
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase

?>

<script type="text/javascript" src="efectopciones.js"></script>
<div id="nuevoTitulo">
	<center><br><br>
    	<h3>Ingrese el título de su banner</h3><br/>              
      <textarea rows="7" cols="30" id="txtTitulo" style="vertical-align:5%;text-align:center; font-size:18px; "></textarea>
      <br><br>
      <div id="btn" onClick="insertarTitulo()">Guardar Título</div> 
  </center>
   
</div>
      
<center><div id="menImg" ></div></center>    

            
</body>
</html>
<?php
}else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';
	
	}}
?>