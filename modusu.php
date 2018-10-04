<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "login.php"
</script>';
}else{
	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	
//	$usuario=$con->session($corr,$tipo);
if( $tipo=="SuperUserAdmin"){?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista de usuarios</title>
</head>

<body>
<center><h2>LISTA DE USUARIOS</h2>
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>

</center>
<?php 
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
	$sql="SELECT * FROM usuarios";	
	//$con->listar("usuario",$sql);
	$con->busquedaindividual("usuario",$sql)
?>
<center><a href="menureg.php">Atras</a></center>
</body>
</html>

<?php 
	}else
		{echo"<center>No tiene privilegios para hacer esto !!!<br><a href='login.php'>Inicio</a>";}
	}?>