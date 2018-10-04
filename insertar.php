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
if(empty($_GET["img"]))
{echo"No se han enviado datos";}else{
$img =$_GET["img"];
include("funciones.php");//incluye una pagina
$con=new funciones();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase
$desc=$_POST['descripcion'];

$sql="INSERT INTO banner (imagen) values('".$img."')";
$res=mysql_query($sql,$conexion);

if ($res){
	echo 'inserción con exito';
	echo '<br></br><a href="mostrar.php">mostrar</a>';
}else{
    echo 'no se puedo insertar';
} 
}
?>

<?php }else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';
	
	}}?>