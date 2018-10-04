<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>alert("usuario no autenticado")self.location = "loguin.php"</script>';
}else{	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>
<?php 
if(empty($_FILES['imagenCurso']['tmp_name']) && isset($_FILES["imagenCurso"]))
	{echo "<br><center>Por Favor envie una imagen <br><a href='index.php'>Atras</a>";}
else{
include("funcionbanner.php");//incluye una pagina
$con=new funcionbanner();//instanciando un objeto
$con->conectar();//el objeto inboca a la clase

$rutaEnServidor='imagenes/cursos/';
$rutaTemporal=$_FILES['imagenCurso']['tmp_name'];
$img_info = getimagesize($rutaTemporal); // ANCHO ALTO IMAGEN
$ancho=$img_info[0]; 
$alto=$img_info[1];
/*QUITO ESPACIOS*/
$cadena=$_FILES['imagenCurso']['name'];
$nomImg= str_replace(" ","","$cadena");
$nombreImagen= $con->tildes($nomImg);
$tamano=$_FILES['imagenCurso']['size'];//tamaño del archivo
$tipo=$_FILES['imagenCurso']['type'];//tipo del archivo
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
//move_uploaded_file($rutaTemporal,$rutaDestino);

	if(file_exists("$rutaDestino"))
	{
	echo"<script>alert('EL ARCHIVO ( $nombreImagen ) YA EXISTE')</script>";
	echo '<br></br><center><a href="index.php">Atras</a>';
	}elseif($tipo!="image/png")
	{
		echo"<script>alert('TIPO DE ARCHIVO ($tipo) NO PERMITIDO DE LA IMAGEN $nombreImagen Solamente se permite image/png')</script>";
		echo '<br></br><center><a href="index.php">Atras</a>';
	}
	elseif($tamano>2000000 || ($ancho>=702 || $ancho<=698) || ($alto>=152 || $alto<=148))//9.5mb 10000000
	{
		echo"<center><div><h3 style='color:red'>El archivo $nombreImagen no debe exeder las 2mb=2000000 kb su peso es: $tamano kb<br>El alto debe tener  150px y ancho 700px<br> Las medidas de su imagen son alto:$alto px y ancho: $ancho px</h3></div>";
		echo '<br></br><center><a href="index.php">Atras</a>';
	}	
	else
	{

	if (move_uploaded_file($rutaTemporal,$rutaDestino)) {	
	echo "<br><center style='color:#44c903'>El archivo $nombreImagen es valido y fue cargado exitosamente.\n";
	$sql="INSERT INTO imagen (imagen,idPer) values('".$nombreImagen."','$ced')";
	$res=mysql_query($sql);

	if ($res){
		echo "<center style='color:#44c903'>Imagen insertada con exito en la base de datos";
		?>
		<script language="Javascript">setTimeout("location.href='index.php'", 6000);</script>
		<?php
		//echo '<br></br><a href="mostrarcursos.php">mostrar</a>';
//		echo '<br></br><center><a href="index.php">Atras</a>';
	}else{
    echo '<center>No se puedo insertar en la base de datos';
	} 
	}else {
	print("Error archivo(s) no subido(s).<br/>");}
		
	}
////////////////////////////////////////////////////////////


	}

?>

<?php }else{echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';}

}?>
