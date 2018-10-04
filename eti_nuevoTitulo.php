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
/*function enviarE(id)
{
location.href="eti_banner.php?varTit="+id;
}*/
function enviar(id)
		{$.get("eti_banner.php",
	   				{	
						varTit: id,
						beforeSend: function(){$("#mostr").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");
						},
						},function(data,status)
								{	//$('#mostr').animate({height: 'show',opacity:'0.9'});
									//$("#mostr").css("color","green");
										
									$("#nuevoTitulo").empty();
									$("#mostr").html(""+data);
									//$("#btn").css("display","none");
								}									
					);/*FIN post*/
	}
function recargar()
{
setTimeout("location.reload()", 1);
}
</script>
<?php 
if(empty($_POST["txtTit"]))
{echo"Por favor ingrese el titulo del banner con un maximo de 50 caracteres";?><script type="text/javascript"> setTimeout("location.reload()", 3000);</script>
		<?php
}else 	
{	
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
	$tabla1=$con->primercampo("eti_imagen");
	if($tabla1=="" )
	{
	echo"<center><div style='color:red'>LA TABLA DE ETIQUETAS DEBE TENER AL MENOS UNA IMAGEN<br> NO EXISTEN IMAGENES DE FONDO PARA ETIQUETAS <BR>PRIMERO  INGRESE ALGUNA IMAGEN ANTES DE CREAR LA ETIQUETA</div><h4 style='color:green'>Rediccionando en 8 segundos</h4>";
	?><script type="text/javascript"> setTimeout("location.reload()", 8000);</script>
		<?php
	}
	else
	{	//si encontro un valor en la tabla que me traiga el primer valor 
		//campo encontrado = al valor a insertar
	$idim=$tabla1;
	$titulo=$_POST["txtTit"];	
	$max=50; 
	$num=strlen($titulo);
	if ($num<=$max){	
	//INSERT INTO `base`.`etiquetas` (`id`, `titulo`, `imagen`, `idPer`) VALUES ('1', 'mi titulo', '1', '1088591516');
	$sql="INSERT INTO  `etiquetas` (`id` ,`titulo` ,`imagen`,`idPer`)VALUES (NULL, '".$titulo."', '$idim','".$ced."')";
	$res=mysql_query($sql)or die("Error: ".mysql_error());
	if ($res)
	{
			echo 'Título ingresado con éxito<br><br>';	
			$consulta=mysql_query("select * from etiquetas where titulo='".$titulo."'");
		while($filas=mysql_fetch_array($consulta))
		{			
			$id=$filas['id'];
			$titu=$filas['titulo'];
			?><script>enviar(<?php echo $id; ?>)</script><?php
			//echo "<br><br><a href='banner.php?varTit=$id'>Seleccionar Imáganes Banner</a>";
//			echo "<div id='btn' onClick='enviarE($id)'>Seleccionar Imagenes</div>";
			//echo "<br><br><a id='btn' href='eti_listarbanners.php'>listar Etiquetas</a>";
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