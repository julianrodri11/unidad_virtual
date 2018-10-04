<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

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
if( $tipo=="SuperUserAdmin" || $tipo=="Docente" || $tipo=="Administrador"){?>



<?php
	
 	$cont1=$_POST['con1'];
 	$cont2=$_POST['con2'];
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar(); 
	$con = mysql_fetch_assoc(mysql_query("SELECT idPer FROM usuarios WHERE idPer='$ced'"));
	//echo "cedula :".$con['idPer'];
	//$conAA=$con['conPer'];
	//contraseña nueva
	$cnew=sha1($_POST['con1']) ;
	
		if($cont1==$cont2)
		{
		  $resultado=@mysql_query("UPDATE usuarios SET conPer = '$cnew' WHERE idPer = $ced") ;
		  if($resultado)
			  {echo "<center ><label style='color:#ffffff;'>Contraseña Actualizada Con Exito</label><br>";
			  $mensaje="Datos de Usuario\n";
			  $mensaje.="Sus datos de acceso son:\n";
			  $mensaje.="Usuario: $corr \n";
			  $mensaje.="Password: $cont1 \n";
			  //$mensaje.="Rol: $rol \n";
			  $mensaje.="Para el ingreso con sus datos a traves de http://virtual.umariana.edu.co/etiquetas/ ";			
			  if(@mail ( "$corr", "Nueva Contraseña" , "$mensaje",null,'-evirtual@umariana.edu.co'))
				  {echo"<br>Se ha enviado un correo con los datos de tu cuenta a: <strong> $corr </strong>";}
			  else{echo"Se ha generado una nueva contraseña, pero los datos no pudieron ser enviados al correo:  <strong> $corr </strong>";}
				
				  //////cerrar session///////////
				  if ($_SESSION['correoUsu'])
				  {	  session_destroy();
					  echo '<script language = javascript>
					  alert("su sesion ha terminado correctamente")
					  self.location = "login.php"
					  </script>';}
				  else
				  {	  echo '<script language = javascript>
					  alert("No ha iniciado ninguna sesión, por favor regístrese")
					  self.location = "login.php"
					  </script>';}
					//////fin cerrar session///////
							  
			  }
		  else{echo"<center style='color:red;'>Los datos no pudieron ser actualizados</center> ";}
		}else{echo"<center style='color:red;'>La nueva contraseña no coincide</center> ";}
	  

?>


</body>
</html>
<?php 
	}else{
	      echo"<CENTER><br><br>NO TIENES PRIVILEGIOS PARA HACER ESTO</center>";
		}
	}?>