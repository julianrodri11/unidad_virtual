<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>alert("usuario no autenticado")self.location = "loguin.php"</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];	 	$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>



<?php 
if(empty($_POST["txtBus"]) || empty($_POST["txtTab"]) )
{
	echo "<center>campos vacios";}else{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>
<?php 
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();
$q=$_POST["txtBus"];
$tabla=$_POST["txtTab"];
if($q==null) //si la caja de texto no tiene nada entonces por v muestra  msg por falso muestra datos
{print'Ingrese algun dato';}
else
{
	function validarcampos($tabla)
	{	
		if($tabla=="imagen"){$campo="imagen"; return $campo;	}else 
		if($tabla=="fondo")	{$campo="fondo";  return $campo; 	}else
		if($tabla=="banners"){$campo="titulo"; return $campo;}

	}

	if($tipo=="Administrador"){	
	$campo=validarcampos($tabla);
	$sql="SELECT * FROM $tabla WHERE id LIKE '%$q%' or $campo LIKE '%$q%'";
	$con->busquedaindividual($tabla,$sql);
	}else 
	
	if($tipo=="Docente"){
	$campo=validarcampos($tabla);	//echo $tabla." - ".$campo."<br>";
	$sql="SELECT * FROM $tabla WHERE idPer LIKE '%$ced%' AND(id LIKE '%$q%' or $campo LIKE '%$q%')";
	$con->busquedaindividual($tabla,$sql);

}

}
	}
?>
<?php }else{echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';}

}?>