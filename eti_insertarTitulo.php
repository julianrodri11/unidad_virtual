<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "loguin.php"
</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	
?>
<?php
if(empty($_POST["txtTit"]) || empty($_POST["idBan"]))
{echo "Variables vacias ";}else{
include("funcionbanner.php");		//incluye una pagina
$con=new funcionbanner();			//instanciando un objeto
$con->conectar();			//llamo conexion base de datos

$titulo=$_POST["txtTit"];
$max=50; 
$num=strlen($titulo);
if ($num<=$max){ 
$idBanner=$_POST['idBan'];
$sentencia="UPDATE  etiquetas SET titulo =  '$titulo' WHERE  id =$idBanner";
$con->actualizar($sentencia);
}else
	{	echo"El numero maximo de caracteres permitidos es 50 $num";	
		?><script type="text/javascript"> setTimeout("location.reload()",4);</script><?php
	}

}?>

<?php }else{echo "<center>No tienes privilegios para hacer esto ";
//	echo '//<br><a href="loguin.php">Iniciar session</a>';
}
}?>