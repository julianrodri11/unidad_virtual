<?php
session_start();
if (!$_SESSION)
{echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "login.php"
</script>';
}else{
	$corr=$_SESSION['correoUsu'];	$tipo=$_SESSION['tipoUsu'];		$ced=$_SESSION['cedula'];	

if( $tipo=="Administrador" || $tipo=="Docente" ){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="banner.css">
<script src="jquery-1.11.0.min.js"></script>
<title>Subir imagen</title>
</head>
<script>
$(function(){
	$("input[name='imagen']").on("change",function(){
		var formData=new FormData($("#form1")[0]);
		var ruta="eti_recibirFondo.php";
		$.ajax({
			url:  ruta,
			type: "POST",
			data: formData,
			contentType:false,
			processData:false,
			success: function(datos)
			{
			$("#respuesta").html(datos);
			}
		});
	});
});

</script>
<body id="bodyfondo">

<form id="form1" name="form1" method="post" action="eti_recibirFondo.php" enctype="multipart/form-data">
  <h2 >Cargar Fondo</h2>    
  <input type="file" name="imagen" id="btn"/>
  <div id="respuesta"></div>
  <!--p><input type="submit" name="Aceptar" id="btn" value="Aceptar" /></p-->
</form>
<div><h3>Importante!!!.. Apreciado <?php echo $tipo.": ". $_SESSION['nombre']; ?></h3>
<p><br /> las medidas de la imagen del curso no deben exceder las siguientes medidas<br/>Ancho: <label style="color:red;">700 px</label><br/>Alto: <label style="color:red;">100px </label><br/>
Si usted tiene problemas con las medidas, la aplicacion cuenta con una galeria de imágenes las cuales puede seleccionar en la edicion del etiqueta . <br />Si usted no tiene un etiqueta creado diríjase al menú crear nuevo etiqueta
<br />Si usted ya tiene un etiqueta diríjase a menú editar/eliminar etiqueta
</p> 
</div>

</body>
</html>
<?php }else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="login.php">Iniciar session</a>';
	
	}}?>