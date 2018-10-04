
<?php 
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
	
	if(empty($_POST["txtCed"]) && isset($_POST["txtCed"])  &&
		empty($_POST["txtNom1"]) && isset($_POST["txtNom1"]) &&
		empty($_POST["txtApe1"]) && isset($_POST["txtApe1"]) &&
		empty($_POST["txtCor"]) && isset($_POST["txtCor"]) &&
		empty($_POST["txtFac"]) && isset($_POST["txtFac"]) 	
	  ) 
	{	echo $con->menRojo("algunos campos son obligatorios");}
	else 	
	{	
	$I=strlen($_POST["txtCed"]);
	$N1=strlen($_POST["txtNom1"]);
	$A1=strlen($_POST["txtApe1"]);
	$CL=strlen($_POST["txtCel"]);
	$CR=strlen($_POST["txtCor"]);
	$COR=$_POST["txtCor"];
	$FC=strlen($_POST["txtFac"]);
	if($I>=13 || $N1>=51 ||  $A1>=51 || $CL>=15 ||  $CR>=51  || $FC>=151 )
	   {echo "<center>CAMPOS DEMASIADOS EXTENSOS DE LONGITUD</center>";
	   }else{	
	   
	   
	if($con->valida_email($COR))
	{	
	$registro=	$con->validarRegistro("usuarios","idPer",$_POST["txtCed"]);
	$valcorreo=	$con->validarRegistro("usuarios","corPer",$_POST["txtCor"]);
	if($registro=="false" && $valcorreo=="false")
	{

		$ii=$_POST["txtCed"];
		$nn1=$_POST["txtNom1"];
		$ap1=$_POST["txtApe1"];
		$cel =$_POST["txtCel"];
		$corr=$_POST["txtCor"];
		$cont1="virtualbannaer%123%*";
		$contr=sha1($cont1);
		$facu=$_POST["txtFac"]; 	

	$sql="INSERT INTO  usuarios (idPer ,nomPer,apePer,celPer,corPer,conPer,facPer,tipPer)	VALUES ('$ii' , '".$nn1."', '".$ap1."', '$cel', '".$corr."', '".$contr."', '".$facu."', 'Docente' )";
	$res=mysql_query($sql)or die("Error: ".mysql_error());
		if ($res)
		{	echo $con->menVerde("<center>Sus datos han sido registrados con exito ... ");
			/************************/
			  $mensaje="Datos de Usuario\n";
			  $mensaje.="Sus datos de acceso son:\n";
			  $mensaje.="Usuario: $corr \n";
			  $mensaje.="Password: $cont1 \n";
			  //$mensaje.="Rol: $rol \n";
			  $mensaje.="Para el ingreso con sus datos a traves de http://virtual.umariana.edu.co/etiquetas/ ";			
			  if(@mail ( "$corr", "Nueva Contraseña" , "$mensaje",null,'-evirtual@umariana.edu.co'))
				  {echo"<center>Se ha enviado un correo con los datos de tu cuenta a: <strong> $corr </strong>";}
			  else{echo"Se ha generado una nueva contraseña, pero los datos no pudieron ser enviados al correo:  <strong> $corr </strong>";}			


			/************************/
		}else
			{  echo $con->menRojo( 'Error no se pudo guardar sus datos :(');
	    	}
	}else{	echo $con->menRojo('El registro ya existe :( ...'); 
		 }
	}else{echo $con->menRojo("Correo no valido, debe registrarse con el correo de la Universidad Mariana. Gracias");}
 
	}/*fin validacion tamaño campo*/
}


?>
