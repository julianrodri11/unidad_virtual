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


<?php 

include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();
 $ce=$_POST['txtCe'];
 $n1=$_POST['txtN1']; $n2=$_POST['txtN2'];
 $a1=$_POST['txtA1']; $a2=$_POST['txtA2'];
 $c=$_POST['txtC'];   $co=$_POST['txtCo'];
 $f=$_POST['txtFac'];
 $var=$con->valida_email($co);
 if($var){

	$resultado=mysql_query("UPDATE usuarios SET nomPer = '$n1', nom2Per = '$n2', apePer = '$a1', ape2Per = '$a2', celPer = '$c', corPer = '$co', facPer = '$f' WHERE usuarios.idPer = $ce");
	if($resultado)
	{echo "<center>Datos Actulzidos<br><a href='cerrar.php'>Salir</a><br><a href='modusu.php'>Lista de usuarios</a></center>";}else{echo"<center>Los datos no pudieron ser actualizados</center> ";}
	}else{echo "<center>Correo no valido... debes utilizar tu correo de la universidad email@umariana.edu.co<br><a href='modusu.php'>Atras</a></center>";}
?>


<?php }else{
	echo"<CENTER><br><br>NO TIENES PRIVILEGIOS PARA HACER ESTO</center>";

	}}?>