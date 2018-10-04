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
	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		 $ced=$_SESSION['cedula'];	
//	$usuario=$con->session($corr,$tipo);
if( $tipo=="SuperUserAdmin" || $tipo=="Docente" || $tipo=="Administrador"){?>



<?php
	
	$cont1=$_POST['con1'];
	$cont2=$_POST['con2'];
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar(); 
	$con = mysql_fetch_assoc(mysql_query("SELECT idPer,conPer FROM usuarios WHERE idPer='$ced'"));
	//echo "cedula :".$con['idPer'];
	//saco ontraseña bd	
	$conAA=$con['conPer'];
	
	//comparo contraseñas bd y frm	
	$confrm=sha1($_POST['conA']);
	
	if($confrm==$conAA)
	{  
	//contraseña nueva
	$cnew=$_POST['con1'] ;
	$cnew2=sha1($_POST['con1']) ;
	
		if($cont1==$cont2)
		{
		  $resultado=@mysql_query("UPDATE usuarios SET conPer = '$cnew2' WHERE idPer = $ced") ;
		  if($resultado)
			  {echo "<center ><label style='color:#5DC300;'>Contraseña Actualizada</label><br>";
			  $mensaje="Datos de Usuario\n";
			  $mensaje.="Sus datos de acceso son:\n";
			  $mensaje.="Usuario: $corr \n";
			  $mensaje.="Password: $cnew \n";
			  //$mensaje.="Rol: $rol \n";
			  $mensaje.="Para el ingreso con sus datos a traves de http://virtual.umariana.edu.co/etiquetas/ ";			
			  @mail ( "$corr", "Nueva Contraseña" , "$mensaje",null,'-evirtual@umariana.edu.co');
		 /*///////////////////////////CORREO/////////////////////////////////////////////*/
			/*
		  require "/phpmailer/class.phpmailer.php";    
          $mail = new PHPMailer;
		  
		  //indico a la clase que use SMTP
          $mail->IsSMTP();		  
          //permite modo debug para ver mensajes de las cosas que van ocurriendo
          //$mail->SMTPDebug = 2;
		  //Debo de hacer autenticación SMTP
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = "ssl";
		  //indico el servidor de Gmail para SMTP
          $mail->Host = "smtp.gmail.com";
		  //indico el puerto que usa Gmail
          $mail->Port = 465;
		  //indico un usuario / clave de un usuario de gmail
          $mail->Username = "julianrodri11@gmail.com";
          $mail->Password = "rodr1desblock1";		  
		  //aqui va a quien se le va enviar el corr
          $mail->From = "Olvide mi contrasena";		  
		  //aqui va el correo del receptor
          $mail->FromName = "Actualizacion contrasena Virtual Banner";        
          $mail->Subject = "Cambiar password virtual banner";        
          $mail->addAddress($corr, $ced);        
          $mail->MsgHTML("<center>Datos Proporcionados <br>Correo:<strong>$corr</strong> <br>Contrasena:<strong> $cont1</strong><br>Cedula: <strong>$ced</strong>");
		  if($mail->Send())
		  { echo $msg= "<br><br><center style='color:green;'>Se ha enviado un correo con los datos de tu cuenta  $corr";  }
		  else
		  {  echo  $msg = "Lo siento, ha habido un error al enviar el mensaje a $corr";  }
	*/
			/*////////////////////////////////////FIN CORREO////////////////////////////////////*/
			
		
		
			//////cerrar session///////////
/*			  if ($_SESSION['correoUsu'])
			  {	
				  session_destroy();
				  echo '<script language = javascript>
				  alert("su sesion ha terminado correctamente")
				  self.location = "login.php"
				  </script>';}
			  else
			  {
				  echo '<script language = javascript>
				  alert("No ha iniciado ninguna sesión, por favor regístrese")
				  self.location = "login.php"
				  </script>';} */
				//////fin cerrar session///////	
						  
			  }
		  else{echo"<center style='color:red;'>Los datos no pudieron ser actualizados</center> ";}
		}else{echo"<center style='color:red;'>La nueva contraseña no coincide</center> ";}
	  
	}else
	{echo"<center><label style='color:red;'>LA CONTRASEÑA ANTIGUA INGRESADA NO COINCIDE</label></center>";}
?>


</body>
</html>
<?php 
	}else{
	      echo"<CENTER><br><br>NO TIENES PRIVILEGIOS PARA HACER ESTO</center>";
		}
	}?>