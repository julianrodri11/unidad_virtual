<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
	echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "loguin.php"
</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>

<?php
if(empty($_POST["img"]))
{echo"No se han enviado parametros";}else{
include("funcionbanner.php");		//incluye una pagina
$con=new funcionbanner();			//instanciando un objeto
$con->conectar();			//llamo conexion base de datos
$imagen=$_POST["img"];
$idBanner=$_POST['idBan'];

$sentencia="UPDATE  banners SET fondo =  '$imagen' WHERE  id =$idBanner;";
$con->actualizar($sentencia);
	
}
 ?>
 
 <?php }else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';
	
	}}?>