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

<script src="jquery-1.11.0.min.js"></script>
<!--script type="text/javascript" src="efecto.js"></script-->
<script type="text/javascript" src="efectopciones.js"></script>
<link rel="stylesheet" type="text/css" href="banner.css"></link> 


<center>
<div id="limpiarbtnb">
Nombre de la imagen de fondo buscar<br>
<input type="text" id="txtBus" placeholder="Buscar" onKeyUp="buscardatos('fondo')">
</div>
<div id="menImg">

<?php
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();
if($tipo=="Administrador")
{	$sql="SELECT * FROM fondo";		
	$con->listar("fondo",$sql);
}
elseif($tipo="Docente")
{
	$sql="SELECT * FROM fondo WHERE idPer=$ced";
	$con->listar("fondo",$sql);
}

?></div>



<?php }else{echo "<center>No tienes privilegios para hacer esto ";
//	echo '//<br><a href="loguin.php">Iniciar session</a>';
}
}?>