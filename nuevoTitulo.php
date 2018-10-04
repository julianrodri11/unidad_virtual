<script src="jquery-1.11.0.min.js"></script>
<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "loguin.php"
</script>';
}else{

	$corr=$_SESSION['correoUsu'];
	$tipo=$_SESSION['tipoUsu'];	
	$ced=$_SESSION['cedula'];	
//	$usuario=$con->session($corr,$tipo);
if( $tipo=="Administrador" || $tipo=="Docente" ){	

?>

<script language="javascript" type="text/javascript">
/*function enviar(id)
{
location.href="banner.php?varTit="+id;
}*/
/*FUNCION PARA LLAMAR IMAGENES*/
	function enviar(id)
		{$.get("banner.php",
	   				{	
						varTit: id,
						beforeSend: function(){$("#mostr").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						},
						},function(data,status)
								{	//$('#mostr').animate({height: 'show',opacity:'0.9'});
									//$("#mostr").css("color","green");										
									$("#nuevoTitulo").empty();
									$("#mostr").html(""+data);
//									$("#btn").css("display","none");
								}									
					);/*FIN post*/
	}
	/*FIN */
function recargar()
{
setTimeout("location.reload()", 1);
}
</script>
<?php 
if(empty($_POST["txtTit"]))
{echo"Por favor ingrese el titulo del banner con un maximo de 85 caracteres";?><script type="text/javascript"> setTimeout("location.reload()", 3000);</script>
		<?php
}else 	
{	
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();

	$tabla1=$con->primercampo("imagen");//valtablavacia("imagen");
	$tabla2=$con->primercampo("fondo");
	if($tabla1=="" || $tabla2=="")
	{		
	echo	$con->menRojo('DEBE HABER ALGUNA IMAGEN EN LAS GALERÍAS DE DISEÑOS E IMÁGENES<br> REVISA LAS GALERÍAS <BR>FAVOR SUBIR ALGUNA IMAGEN');

	}
	else
	{
	$id1imagen=$tabla1;
	$id1fondo=$tabla2;
	$titulo=$_POST["txtTit"];	
	$max=85; 
	$num=strlen($titulo);
	if ($num<=$max){	
	$sql="INSERT INTO  `banners` (`id` ,`titulo` ,`imagen` ,`fondo`,`color`,`tamano`,`fuente`,`idPer`)VALUES (NULL , '".$titulo."',  '$id1imagen',  '$id1fondo','ffffff','11','1','".$ced."')";
	$res=mysql_query($sql)or die("Error: ".mysql_error());
	if ($res)
	{
			echo '<label style="color:green;">Título ingresado con éxito</label><br><br>';	
			$consulta=mysql_query("select * from banners where titulo='".$titulo."'");
		while($filas=mysql_fetch_array($consulta))
		{			
			$id=$filas['id'];
			$titu=$filas['titulo'];
			//echo "<br><br><a href='banner.php?varTit=$id'>Seleccionar Imáganes Banner</a>";
			?><script>enviar(<?php echo $id; ?>)</script><?php
//			echo "";
			//echo "<br><br><a id='btn' href='listarbanners.php'>lISTAR BANNERS</a>";
			//echo "$id";
		}	

	}else{ echo 'Error no se pudo guardar su título';
		  }
		  
   }else{echo"El numero maximo de caracteres permitidos es 85 usted ha ingresado: $num";
		 echo"<br><br><a href='#' onClick='recargar()'>Atras</a>";
   		 }
	}
}

}else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';
	
	}}
?>
<div id="mostr" style="text-align:center;margin:0 auto;"></div>