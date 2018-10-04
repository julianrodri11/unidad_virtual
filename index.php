<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){?><script language="Javascript">setTimeout("location.href='login.php'", 10);</script><?php
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
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efecto.js"></script>
</head>
<link type="text/css" rel="stylesheet" href="index.css">
<style >

</style>

<body>
<div id="princip">
	<div id="encabezado">
	</div><!--FINMENUENCABEZADO-->
    
    <div id="menuindex">    	
		
        <div id="redes">        
        	<a href="https://www.facebook.com/unimarvirtual?fref=ts"><div id="r1"><img src="imagenes/fw.png"></div></a>
            <a href="http://virtual.umariana.edu.co/e-learning/login/"><div id="r2"><img src="imagenes/e-learning-black.png"></div></a>
            <a href="http://virtual.umariana.edu.co/b-learning/login/"><div id="r3"><img src="imagenes/b-learning-black.png"></div></a>
            <a href="http://www.umariana.edu.co/"><div id="r4"><img src="imagenes/defaultlogowhite.png" height="40"></div></a>
        </div><!--FIN REDES-->
        <div id="link">	<div id="datos">Modificar Contraseña</div>		</div><!--FIN LINK-->
<div id="sess"><?php echo strtoupper($_SESSION['nombre'])." ".strtoupper($_SESSION['apellido'])."<center><a href='cerrar.php' style='color:#000;'>cerrar sesion</a></center> ";?></div>        
    </div><!--FIN MENUINDEX-->
    
    <div id="centro">
    	<div id="liz"><div id="imgmenu">
        				<!----AQUI VA EL MENU----->
           					<!--div id="imgm"></div-->
                              <ol>
                                  <li id="abrir">
                                      <img src="imagenes/miBa.png" >
                                      <ul class="padre1">
                                          <li id="nb"><img src="imagenes/nueban.png"></li>
                                          <li id="abrirgal"><img src="imagenes/galdis.png">
                                          		<ul class="hija" id="h1">
                                          		 <?php if ($tipo=="Administrador"){ ?>
                                                 <li id="sc"><img src="imagenes/subir.png"></li>
                                          		<li id="ec"><img src="imagenes/eliminar.png"></li>
                                                <?php } ?>
                                                <li id="gd"><img src="imagenes/galeria.png"></li>                                                
                                                </ul>
                                          </li>
                                          <li id="abrirdis"><img src="imagenes/galimg.png">
                                          		<ul class="hija" id="h2">
                                          		<li id="sd"><img src="imagenes/subir.png"></li>                                               
                                          		<li id="ef"><img src="imagenes/eliminar.png"></li>
                                          		<li id="gi"><img src="imagenes/galeria.png"></li>                                                 
                                                </ul>
                                          </li>                                          
                                          <li id="edb"><img src="imagenes/edba.png"></li>                                          
                                     </ul>
                                     
                                  </li>
                                  <li id="abrir2">
                                      <img src="imagenes/miseti.png">
                                      <ul class="padre2">
                                      <li id="ne"><img src="imagenes/neweti.png"></li>
                                      <li id="abrirdise"><img src="imagenes/galdis.png">   
                                      			<ul class="hija" id="h3">                                   
                                          		<li id="sfe"><img src="imagenes/subir.png"></li>
                                          		<li id="efe"><img src="imagenes/eliminar.png"></li>
                                          		<li id="ge"><img src="imagenes/galeria.png"></li>                                                                                                
                                                </ul>
                                      </li>                                                             
                                      <li id="ede"><img src="imagenes/ediet.png"></li>              
                                      </ul>
                                  </li>
                                  <li id="tb">
                                      <img src="imagenes/galban.png" width="212" height="36">
                                      <!--ul>
                                          <li>gggg</li>
                                          <li>gggg</li>
                                          <li>gggg</li>
                                      </ul-->
                                  </li>
                                  <li id="te">
                                      <img src="imagenes/galet.png" width="212" height="36">
                                      <!--ul>
                                          <li>gggg</li>
                                          <li>ggggr</li>
                                          <li>gggg</li>
                                      </ul-->
                                  </li>
                              </ol>
                        <!------------------------>
        			</div><!--fin imgmenu-->
        </div><!--fin li-->
        <div id="ld"><div id="contenido">
          <!----------------AQUI VAN LOS FRAMES--------------------->              
              <div id="destino" ><img id="paini" src="imagenes/videoCrearCuenta.png" noresize scrolling="no" width="100%" height="100%" frameborder="0"/></div>
          <!-------------------FIN FRAMES------------------>
        			 </div><!--FIN CONTENIDO-->
        </div><!--FIN LADO DERECHO-->
    </div><!--FIN CENTRO-->
    
    <div id="inferior">

    </div><!--FIN INFERIOR-->
    <div id="desarrollador">
			 Copyright © 2014 <a href="http://www.umariana.edu.co/" id="um">Universidad Mariana Virtual</a> | Dimensión Tegnológica | Desarrollador: <a href="http://mjsoftwaresolutions.com.co" id="mjss">Julian Rodriguez</a><br>Contacto:<a href="http://google.com/+JulianRodriguez11" id="corr">  julianrodri11@gmail.com</a> | Diseño Gráfico:<a href="https://plus.google.com/116092337922962626557/about" id="colab"> Magda Solarte</a>
    </div><!--FIN DESARROLLADOR-->    	
    <div id="infcopy"><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
	<img alt="Licencia Creative Commons"  src="http://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" />
</a><br />
<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Aplicación para creacion de banner y etiquetas en cursos virtuales </span>
 por <a xmlns:cc="http://creativecommons.org/ns#" href="http://mjsoftwaresolutions.com.co/" property="cc:attributionName" rel="cc:attributionURL">Julian Enrique Rodriguez Valenzuela</a><br> se distribuye bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Licencia Creative Commons Atribución-NoComercial-SinDerivar 4.0 Internacional</a>.<br />Basada en una obra en <a xmlns:dct="http://purl.org/dc/terms/" href="http://virtual.umariana.edu.co/" rel="dct:source">http://virtual.umariana.edu.co/</a>.</div><!--FIN INCOPIA-->
</div>
</body>
</html>
<?php }else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="login.php">Iniciar session</a>';
	
	}}?>