<?php
//Inicio de variables de sesión
if (!isset($_SESSION)) {
  session_start();
}

if(isset($_POST['user']) && !empty($_POST['user']) &&
   isset($_POST['pw']) && !empty($_POST['pw']))
{	
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();//el objeto inboca a la clase
	$kuuse= $_POST['user'];
	$pp = $_POST['pw'];
	if(strlen($kuuse)>=100 || strlen($pp)>200)
	{echo"<center><h4 style='color:#FB0004'>la cadena que a ingresado tiene demasiados caracteres</h5>";}
	else
	{
	$v=$kuuse;
	$p=$pp;	
	$var=$con->tildes($v);
	$pw=$con->tildes($p);
	$pwsha1=sha1($pw);  	
	$sql=mysql_query("SELECT * FROM usuarios WHERE corPer='$var' AND conPer='$pwsha1'") or die(mysql_error());
    $consulta=mysql_fetch_array($sql);
    if($pwsha1 == $consulta['conPer'])
        {	$_SESSION['cedula']=$consulta['idPer'];
			$_SESSION['correoUsu']=$consulta['corPer'];
			$_SESSION['tipoUsu']=$consulta['tipPer'];
			$_SESSION['nombre']=$consulta['nomPer'];
			$_SESSION['apellido']=$consulta['apePer'];

			if($_SESSION['tipoUsu']=="Administrador" || $_SESSION['tipoUsu']=="Docente")
				{header('Location:index.php');}
				else 
				if($_SESSION['tipoUsu']=='SuperUserAdmin'){header('Location:menureg.php');}
			else{header('Location:login.php');}			  
        }else
            { echo "<center><h4 style='color:red'>Verifica tus datos el usuario no esta registrado<h4><br><a href='login.php'>Atras</a></center>";       
			}
	}
}else
    {
    echo"<center>Por favor rellena los campos</center>";   
    }
    
?>
