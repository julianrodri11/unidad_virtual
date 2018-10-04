<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>alert("usuario no autenticado")self.location = "loguin.php"</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>
<?php 
if(empty($_FILES['imagen']['tmp_name']) && isset($_FILES["imagen"]))
{
	echo "<br><center>Por Favor envie una imagen png o jpg<br><a href='eti_cargarfondo.php'>Atras</a>"; 

}else{
/*conexion*/
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase

$rutaEnServidor='imagenes/eti_imagen/';
$rutaTemporal=$_FILES['imagen']['tmp_name'];
$img_info = getimagesize($rutaTemporal); // 
$ancho=$img_info[0]; 
$alto=$img_info[1];
$cadena=$_FILES['imagen']['name'];
$nomImg= str_replace(" ","","$cadena");
$nombreImagen= $con->tildes($nomImg);
//echo $nombreImagen;

$tamano=$_FILES['imagen']['size'];//tamaño del archivo
$tipo=$_FILES['imagen']['type'];//tipo del archivo
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
	if(file_exists("$rutaDestino"))
	{
	echo"EL ARCHIVO $nombreImagen YA EXISTE";
	//echo '<br></br><center><a href="eti_cargarfondo.php">Atras</a>';
	}elseif($tipo!="image/png" && $tipo!="image/jpeg")
	{
		echo"<script>alert('TIPO DE ARCHIVO $tipo NO PERMITIDO DE LA IMAGEN $nombreImagen Solamente se permite jpg y png')</script>";
		//echo '<br></br><center><a href="eti_cargarfondo.php">Atras</a>';
	}
	elseif($tamano>2000000 ||  $ancho<=695 || $ancho>=705 || $alto<=95 || $alto >=105  )//9.5mb 10000000
	{
	echo"<center><div><h3 style='color:red'>El archivo $nombreImagen no debe exeder las 2mb=2000000 kb su peso es: $tamano kb
	<br>El alto debe estar entre los:<label style='color:red'> 50px y 105px</label> y ancho entre <label style='color:red'>695px</label> y 705px <br> Las medidas de su imagen son alto:$alto px y ancho: $ancho px</h3></div>";
	//	echo '<br></br><center><a href="eti_cargarfondo.php">Atras</a>';
	}	
	else
	{

	if (move_uploaded_file($rutaTemporal,$rutaDestino)) {		
	
	echo "<br><center style='color:#44c903;'>El archivo $nombreImagen es valido y fue cargado exitosamente.\n";
	$sql="INSERT INTO eti_imagen (imagen,idPer) values('".$nombreImagen."','$ced')";
	$res=mysql_query($sql);
	if ($res){
	echo "<center style='color:#44c903;'>Imagen insertada con exito en la base de datos";
	//< script language="Javascript">setTimeout("location.href='index.php'", 6000);< /script>
	
	//	echo '<br></br><a href="eti_mostrarfondos.php">Mostrar</a>';
	//	echo '<br></br><center><a href="eti_cargarfondo.php">Atras</a>';
	}else{
    echo '<center>No se puedo insertar en la base de datos';
	} 	
	} else {
	print("Error archivo(s) no subido(s).<br/>");}
		
	}
////////////////////////////////////////////////////////////


	}

?><?php }else{echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';}

}?>
