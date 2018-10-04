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


include("funcionbanner.php");//incluye una pagina
	$con=new funcionbanner();//instanciando un objeto
	$con->conectar();
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Etiquetas</title>
</head>

<script src="jquery-1.11.0.min.js"></script>
<!--script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script-->
<link rel="stylesheet" type="text/css" href="hoja1.css" />
<link rel="stylesheet" type="text/css" href="banner.css" />
<script type="text/javascript" language="javascript" src="efeind.js"></script>

<body>
<center><img src="imagenes/navi.jpg" width="80%" /></center>

<h5>BIENVENIDO 
<?php echo strtoupper($_SESSION['nombre'])." ".strtoupper($_SESSION['apellido'])."<center><a href='cerrar.php'>cerrar sesion</a></center> ";?>
<div id="contenedor">
	<div class="menu" id="uno"><br>
  	<div class="titulo" id="uu1"><a href="eti_nuevobanner.php">crear nuevo Etiqueta</a></div>
    <div class="oculto" id="nb">
	<!---------------------------------------------->

    <!----------------------------------------------->
    </div>
  </div>
  
 	<div class="menu" id="dos"><br>
  	<div class="titulo" id="d2">subir imagen etiqueta</div>
    <div class="oculto" id="sf"><br>
    <!----------------------------------------------->
	    <iframe src="eti_cargarfondo.php" noresize scrolling="YES" width="800" height="450" frameborder="0"></iframe>						
    <!----------------------------------------------->
    </div>
  </div>
  

 	<div class="menu" id="cuatro"><br>
   	<div class="titulo" id="cc4"><a href="eti_listarbanners.php">editar / eliminar Etiqueta</a></div>
    <div class="oculto" id="eeb"><br>
    </div>
  </div>
  
 	<div class="menu" id="cinco"><br>
   	<div class="titulo" id="c5">galeria de imagénes: etiquetas</div>
    <div class="oculto" id="gf"><br>
    <!----------------------------------------------->
	    <iframe src="eti_mostrarfondos.php" noresize scrolling="YES" width="800" height="450" frameborder="0"></iframe>						    
    <!----------------------------------------------->

    </div>
  </div>
  
 	<div class="menu" id="siete"><br>
   	<div class="titulo" id="ss7" ><a href="eti_listarbanners.php">buscar mi etiqueta</a></div>
    <div class="oculto" id="mtb"><br>
    
	  </div>
    </div>
    
   	<div class="menu" id="ocho"><br>
   	<div class="titulo" id="s8" >Eliminar imagen</div>
    <div class="oculto" id="bef"><br>
    <!----------------------------------------------->
	    <iframe src="eti_leifondos.php" noresize scrolling="YES" width="800" height="450" frameborder="0"></iframe>						    
    <!----------------------------------------------->    
      </div>
    </div>
        <div class="menu" id="siete"><br>
   	<div class="titulo" id="s7" ><a href="proyectose.php">Mirar Las Etiquetas De La Aplicación</a></div>
    <div class="oculto" id="mtb"><br>
	  </div>
    </div>

  </div>
	<div id="diesEti" ><div id="menusInf"><a id="inicio" href="http://virtual.umariana.edu.co">Unidad Virtual</a><br><a id="inicio" href="index.php">Menu Banners</a><br><div id="copy">Copyright © 2014 <a href="http://www.umariana.edu.co/" id="um">Universidad Mariana Virtual</a> | Dimensión Tegnológica | Desarrollador: <a href="http://mjsoftwaresolutions.com.co" id="mjss">Julian Rodriguez</a><br>Contacto:<a href="http://google.com/+JulianRodriguez11" id="corr">  julianrodri11@gmail.com</a> | Diseño Gráfico:<a href="https://plus.google.com/116092337922962626557/about" id="colab"> Magda Solarte</a></div></div></div>
	<br><div id="creditos">
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Aplicación para creacion de banner y etiquetas en cursos virtuales </span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://mjsoftwaresolutions.com.co/" property="cc:attributionName" rel="cc:attributionURL">Julian Enrique Rodriguez Valenzuela</a> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Licencia Creative Commons Atribución-NoComercial-SinDerivar 4.0 Internacional</a>.<br />Basada en una obra en <a xmlns:dct="http://purl.org/dc/terms/" href="http://virtual.umariana.edu.co/" rel="dct:source">http://virtual.umariana.edu.co/</a>.
</div>
</div>
</body>
</html>
<?php }else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="loguin.php">Iniciar session</a>';
	
	}}?>