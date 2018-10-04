<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>
<link type="text/css" rel="stylesheet" href="contrasena.css">
</head>
<body>
<?php
	include_once("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar(); 
	
  	$ced=$con->tildes($_POST['ced']);
	$cor=$con->tildes($_POST['cor']);
	if(!is_int($ced) && $ced>1 && strlen($ced)<"12" && strlen($cor)<"98" && filter_var($cor, FILTER_VALIDATE_EMAIL))
	{//echo"los datos cumplen";
	
	
	 $con = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE idPer='$ced'"));
	 $cedu=$con['idPer'];	
	//saco la cedula y el correo y si no coinciden no envio el email
	 $corr=$con['corPer'];
	 $cont=$con['conPer'];
 	 $tipo=$con['tipPer'];	
	//comparo datos
	if($ced==$con['idPer'] && $cor==$corr)
	{	

/////////******************************//////////////////////////
		  $cnew="unidadvirtual%123%";
		  $cnew2="unidadvirtual%123%";
		  $resultado=@mysql_query("UPDATE usuarios SET conPer = sha1('$cnew2') WHERE idPer = $ced") ;
		  if($resultado)
			  {echo "<center ><label style='color:#ffffff;'><br>Se ha generado una nueva contraseña</label><br>";
  		/*////////////////////////////////////////////////////////////////////////*/
		/*
		require "/phpmailer/class.phpmailer.php";    
		$mail = new PHPMailer;		  
		$mail->IsSMTP();		  
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "";
		$mail->Password = "";		  
		$mail->From = "Olvide mi contrasena";		  
		$mail->FromName = "Recuperar Password Unidad virtual";        
		$mail->Subject = "Cambiar password virtual banner";        
		$mail->addAddress($corr, $cedu);        
		$mail->MsgHTML("<center>Datos Proporcionados <br>Correo:<strong>$corr</strong> <br>Contrasena:<strong>  $cnew </strong><br>Cedula: <strong>$ced</strong>");
		if($mail->Send())
		{echo $msg= "<br><br><center style='color:#ffffff;'>Se ha enviado un correo con los datos de tu cuenta a: <strong> $corr </strong>";}
		else
		{echo  $msg = "Lo siento, ha habido un error al enviar el mensaje a $corr";}*/
    
		$mensaje="Datos de Usuario\n";
		$mensaje.="Sus datos de acceso son:\n";
		$mensaje.="Usuario: $corr \n";
		$mensaje.="Password: $cnew \n";
		//$mensaje.="Rol: $rol \n";
		$mensaje.="Para el ingreso con sus datos a traves de http://virtual.umariana.edu.co/etiquetas/ ";			
		if(@mail ( "$corr", "Nueva Contraseña" , "$mensaje",null,'-evirtual@umariana.edu.co'))
		{
			echo"<br>Se ha enviado un correo con los datos de tu cuenta a: <strong> $corr </strong>";
		}else{
			echo"Se ha generado una nueva contraseña, pero los datos no pudieron ser enviados al correo:  <strong> $corr </strong>";
			}
  		/*////////////////////////////////////////////////////////////////////////*/
			  
			  }else
			  	{echo"<center style='color:red;'>Los datos no pudieron ser actualizados</center> ";}

/////////******************************//////////////////////////



	}
	else
	{echo"<center style='color:red;'><strong>Verifica tu informacion</strong><br> alguno de los datos no es existe en el sistema";}

	
	
?>

<?php 
}else{echo"<center style='color:red;'><strong>Verifica tu información</strong><br>El campo cedula debe ser entero <br>verifica si tu correo esta bien ";}//fin else de validaciones
?>
</body>
</html>
