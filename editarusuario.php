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
if( $tipo=="SuperUserAdmin"){?>



<?php
	include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar(); 
	$q=$_GET['varTit'];
	$con = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE idPer='$q'"));

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrar Usuario</title>
</head>
<link type="text/css" rel="stylesheet" href="registro.css">

<body>
	<div id="content"></div>
	<div id="franamarilla"></div>
	<div id="adorchur"></div>
	<div id="frm">    
    <form method="post" action="actualizarusuario.php">
<table align="center" width="auto" border="0" cellspacing="0" cellpadding="0">
 <tr>
   <td ><label style="color:#F8A303;">Actualización de datos</label></td>
 </tr>
   <tr>
     <td><input type="hidden" class="caja2" value="<?php print $con['idPer']; ?>" id="txtCe" name="txtCe" /></td>
   </tr>
   
     <tr>
   <td >Primer Nombre</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2"  value="<?php print $con['nomPer']; ?>" id="txtN1" name="txtN1" /></td>
   </tr>
   
     <tr>
   <td >Segundo Nombre</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2" value="<?php  print $con['nom2Per']; ?>" id="txtN2" name="txtN2"/></td>
   </tr>
     <tr>
   <td >Primer Apellido</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2" value="<?php  print $con['apePer']; ?>" id="txtA1" name="txtA1"/>
</td>
   </tr>
     <tr>
   <td >Segundo Apellido</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2" value="<?php  print $con['ape2Per']; ?>" id="txtA2"  name="txtA2"/>
</td>
   </tr>
    <tr>
   <td >Celular</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2" value="<?php  print $con['celPer']; ?>" id="txtC" name="txtC" />
</td>
   </tr>
   
         <tr>
   <td >Correo</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2" value="<?php  print $con['corPer']; ?>" id="txtCo"  name="txtCo"/>
</td>
   </tr>
  <tr>
   <td >Facultad</td>
 </tr>
   <tr>
     <td><input type="text" class="caja2" value="<?php  print $con['facPer']; ?>" id="txtFac"  name="txtFac"/>
</td>
   </tr>
   <tr><td>...<td></tr>
  <tr>
   <td ><input type="submit" name="button" id="btnEnv" value="Actualizar" /></td>
 </tr>
</table>
</form>
    </div>



</body>
</html>


</body>
</html>


<?php }else{
	echo"<CENTER><br><br>NO TIENES PRIVILEGIOS PARA HACER ESTO</center>";

	}}?>