<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "login.php"
</script>';
}else{		$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="SuperUserAdmin" ){	

?>


<?php 
 if(empty($_GET['id']))
 {echo "no se puede eliminar el banner variable vacia";}
 else
 {
	if(ctype_digit($_GET['id']))
    {//echo "hola";
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();//el objeto inboca a la clase
	$id=$_GET['id'];	
	$tabla="usuarios";
	$con->eliminar_banner($id,$tabla,"");
	@mysql_close ($conexion);
	 }else{echo"debe ser un entero";}
 }


?>


<?php }else{echo "<center>No tienes privilegios para hacer esto ";
//	echo '//<br><a href="login.php">Iniciar session</a>';
}
}?>