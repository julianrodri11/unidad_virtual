
<!doctype html>
<html>
<head>
<title</title>
</head>
<body>
<?php 

class funcionbanner
{
	var $conexion;
	public function conectar()
		{	//variables 
		//	$conexion=mysql_pconnect('localhost','etiquetas','etiquetas*123') or die("no se conecto".mysql_error());
			$conexion=mysql_pconnect('localhost','root','julian') or die("no se conecto".mysql_error());
			mysql_select_db("base",$conexion)or die("no Existe la base de datos".mysql_error());
			return $conexion;
		}	//end conectar	

	
	public function actualizar($sentenciaJR)
	{	$sql="$sentenciaJR";		
		$error = "Informacion: ". mysql_error();
		$consulta = @mysql_query($sql) or die ($error);
		if($consulta)
		{echo"<h4 style='color:green;'>Datos Actualizados</h4>";}
		else{echo"<h4 style='color:red;'>Datos no actulizados </h4>";}
//		echo"<meta http-equiv='refresh' content='1' >";
		?><!--script type="text/javascript"> setTimeout("location.reload()", 3000);</script-->
		<?php
		@mysql_close ($conexion);
	}
		
	public function buscar($campo1,$tabla,$idBanner)
	{	
		$consulta=mysql_query("select * from $tabla ");
			while($filas=mysql_fetch_array($consulta))
			{
				/*PACA CAMBIAR LA IMAGEN DE FONDO DE LA ETIQUETA*/
			if($tabla=="eti_imagen" && $campo1=="imagen")
			{
				$id=$filas['id'];
				$imagen=$filas["imagen"];?>
				<img src="./imagenes/eti_imagen/<?php echo $imagen; ?>" width="250px" height="150px" border="1" onClick=Eti_selImg('<?php echo $id; ?>','<?php 	echo $idBanner; ?>');>    				
				<?php
			}else
			if($campo1=="imagen"){
				$id=$filas['id'];
				$imagen=$filas["imagen"];?>
				<img src="./imagenes/cursos/<?php echo $imagen; ?>" width="250px" height="150px" border="1" onClick=selImgCur('<?php echo $id; ?>','<?php 	echo $idBanner; ?>');>    				
				<?php 
			}else 
			if($campo1=="fondo"){				
				$id=$filas['id'];
				$imagen=$filas['fondo'];
				?>
			<img src="./imagenes/fondos/<?php echo $imagen; ?>" width="250px" height="150px" border="1" onClick=selFondo('<?php echo $id; ?>','<?php echo $idBanner; ?>');>    		
			<?php 
			}///FIN ELSE IF	
			else 
			if($tabla=="banners"){
				$id=$filas['id'];			
				$titulo=$filas['titulo'];
				if($id==$idBanner){
				?>
			<input type="text" id="txtTit" onBlur="insTitulo('<?php echo $idBanner; ?>')" value="<?php echo $titulo; ?>" size="90" maxlength="85" style="border-color:#000000; border:groove; text-align:center;"/>
            <div id="imagenvistob"></div>
			<?php }//end if idbanner

			}
			else 
			if($tabla=="etiquetas"){/*SIRVE PARA CAMBIAR EL TITULO DE LA ETIQUETA*/
				$id=$filas['id'];			
				$titulo=$filas['titulo'];
				if($id==$idBanner){
				?>
			<input type="text" id="txtTit" onBlur="eti_insTitulo('<?php echo $idBanner; ?>')" value="<?php echo $titulo; ?>" size="90" maxlength="85" style="border-color:#000000; border:groove; text-align:center;"/>
             <div id="imagenvistob"></div>
			<?php }//end if etiquetas
			
			}
			
			else 
			if($tabla=="fuentes"){/*SIRVE PARA CAMBIAR EL TITULO DE LA ETIQUETA*/
			$id=$filas['id'];			
			$titulo=$filas['fuente'];
			

			?>                      
             <!--div id="imagenvistob"  onClick=cambiarfuente('< ?php echo $idBanner; ?>','< ?php echo $id; ?>')></div-->
             <!-- no necesito la fuente solo el tañano-->
             <script>cambiarfuente('<?php echo $idBanner; ?>','<?php echo $id; ?>','<?php echo $titulo; ?>')</script>
			<?php //end if fuentes
			
			}
			

			
			///FIN ELSE IF
			
				
		 }//FIN WHILE
		 @mysql_close ($conexion);
	}//FIN FUNCION BUSCAR
	
	//MUESTRA UN BANNER POR ID
	public function mostrar($id)
	{	
	$consulta=mysql_query("SELECT  `banners`.`titulo` ,  `imagen`.`imagen` ,  `fondo`.`fondo` FROM banners LEFT JOIN  `base`.`fondo` ON `banners`.`fondo` =  `fondo`.`id` LEFT JOIN  `base`.`imagen` ON  `banners`.`imagen` =  `imagen`.`id` WHERE  `banners`.`id` =$id");	
	while($filas=mysql_fetch_array($consulta)){
	$titulo=$filas["titulo"];
	$imagen=$filas['imagen'];
	$fondo=$filas['fondo'];
	 ?> 

     <iframe src="todos.php?id=<?php echo $id; ?>" noresize scrolling="no" id="content" frameborder="0" width="100%" height="100%"></iframe>
    <div id="opc"> 
    	<div class="men" id="open" >Cambiar Título</div>
        <div class="men" id="openFondo">Cambiar Diseño</div>
        <div class="men" id="openCurso">Cambiar Imagen</div>
        <div class="men" id="openTexto">Cambiar Fuente</div>
    </div>    
	   <?php 
   		}
		@mysql_close ($conexion);
	}

	public function eti_mostrar($id)
	{	
	
	$consulta=mysql_query("SELECT `usuarios`.`idPer`,`etiquetas`.`id`,`etiquetas`.`titulo`,`eti_imagen`.`imagen` FROM usuarios LEFT JOIN `base`.`etiquetas` ON `usuarios`.`idPer` = `etiquetas`.`idPer` 
LEFT JOIN `base`.`eti_imagen` ON `etiquetas`.`imagen` = `eti_imagen`.`id` WHERE  `etiquetas`.`id` =$id");	
	while($filas=mysql_fetch_array($consulta)){
	$titulo=$filas["titulo"];
	$imagen=$filas['imagen'];
/*	  <!-- ///////////////////////////////// -->
	<!--div id="conten">	
    	<div id="eti_imgFondo" style="background-image:url(imagenes/eti_imagen/<?php echo $imagen; ?>); width:100%; height:100%;">	        
    	    <center><div id="eti_titCurso">< ?php echo $titulo;?></div></center>        
        </div>        
    </div>
    </div--> */  ?>
    <iframe src="eti_todos.php?id=<?php echo $id;?>" noresize scrolling="no" width="100%" height="100"  frameborder="0"></iframe>
	
    <div id="opc"> 
    	<div class="men" id="eti_open" >Cambiar Título Etiqueta</div>
        <div class="men" id="eti_openFondo">Cambiar Imagen Etiqueta</div>
    </div>    
	   <?php 
   		}
		@mysql_close ($conexion);
	}

	
	/*MUESTA TODOS LOS BANNERS*/
	public function mostrarTodos($id,$ced)
	{	
	if($id=="2571098bda6fbf33a0f082c7c3cb0bcb49306dc0")
	{
	$consulta=mysql_query("SELECT  `banners`.`titulo` ,`banners`.`color`,  `imagen`.`imagen` ,  `fondo`.`fondo` FROM banners LEFT JOIN  `base`.`fondo` ON `banners`.`fondo` =  `fondo`.`id` LEFT JOIN  `base`.`imagen` ON  `banners`.`imagen` =  `imagen`.`id` WHERE `banners`.`idPer`='$ced'");
	}else if($id=="adminroot")
	{
	$consulta=mysql_query("SELECT  `banners`.`titulo` ,`banners`.`color`,  `imagen`.`imagen` ,  `fondo`.`fondo` FROM banners LEFT JOIN  `base`.`fondo` ON `banners`.`fondo` =  `fondo`.`id` LEFT JOIN  `base`.`imagen` ON  `banners`.`imagen` =  `imagen`.`id`");		
	}else 
	{$consulta=mysql_query("SELECT  `banners`.`titulo`,`banners`.`color` ,  `imagen`.`imagen` ,  `fondo`.`fondo` FROM banners LEFT JOIN  `base`.`fondo` ON `banners`.`fondo` =  `fondo`.`id` LEFT JOIN  `base`.`imagen` ON  `banners`.`imagen` =  `imagen`.`id` WHERE  `banners`.`id` =$id");}
	
	while($filas=mysql_fetch_array($consulta)){
//	$id=$filas['id'];
	$titulo=$filas["titulo"];	
	$imagen=$filas['imagen'];
	$fondo=$filas['fondo'];
	$color=$filas['color'];
	   ?>
      <div id="conten">

    		<div id="imgFondo" style="background-image:url(imagenes/fondos/<?php echo $fondo; ?>); background-repeat:no-repeat;background-size:contain;"></div> 
            <div id="imgCurso" style="background-image:url(imagenes/cursos/<?php echo $imagen; ?>); background-repeat:no-repeat;background-size:contain; ">
       		<div id="titCurso" style="color:<?=$color;?>"><?php echo $titulo; ?></div>
       			
	        </div>  
		</div>
      <br/>
      
	  <?php }
	@mysql_close ($conexion);
	}
	/*EDITAR ELIMINAR UN BANNER*/
	
	
	
		/*MUESTA TODAS LAS ETIQUETAS*/
	public function eti_mostrarTodos($id,$ced)
	{	
	if($id=="docente")
	{
	$consulta=mysql_query("SELECT `usuarios`.`idPer`,`etiquetas`.`id`,`etiquetas`.`titulo`,`eti_imagen`.`imagen` FROM usuarios LEFT JOIN `base`.`etiquetas` ON `usuarios`.`idPer` = `etiquetas`.`idPer` 
LEFT JOIN `base`.`eti_imagen` ON `etiquetas`.`imagen` = `eti_imagen`.`id` WHERE  `etiquetas`.`idPer` =$ced");
	}else if($id=="adminroot")
	{
	$consulta=mysql_query("SELECT `usuarios`.`idPer`,`etiquetas`.`id`,`etiquetas`.`titulo`,`eti_imagen`.`imagen` FROM usuarios LEFT JOIN `base`.`etiquetas` ON `usuarios`.`idPer` = `etiquetas`.`idPer` 
LEFT JOIN `base`.`eti_imagen` ON `etiquetas`.`imagen` = `eti_imagen`.`id` WHERE `etiquetas`.`id`!=''");		
	}else	
	{$consulta=mysql_query("SELECT `usuarios`.`idPer`,`etiquetas`.`id`,`etiquetas`.`titulo`,`eti_imagen`.`imagen` FROM usuarios LEFT JOIN `base`.`etiquetas` ON `usuarios`.`idPer` = `etiquetas`.`idPer` 
LEFT JOIN `base`.`eti_imagen` ON `etiquetas`.`imagen` = `eti_imagen`.`id` WHERE  `etiquetas`.`id` =$id");}
	
	while($filas=mysql_fetch_array($consulta)){
	//	$id=$filas['id'];
	$titulo=$filas["titulo"];	
	$imagen=$filas['imagen'];
	 ?> 
	<div id="conten">
	<div id="eti_imgFondo" style="background-image:url(imagenes/eti_imagen/<?php echo $imagen; ?>); width:100%;height:100%">    
        <div id="eti_titCurso"><?php echo $titulo; ?></div>
        </div>        
    </div>   
	</div><br/><?php }
	@mysql_close ($conexion);
	}
	/*EDITAR ELIMINAR UN BANNER*/
	
	/*function listar($tabla,$camtabla,$camcomparar)*/
	function listar($tabla,$sentencia)
	{		
	$sql=$sentencia;
	$error = "no se pueden mostrar los datos". mysql_error();
	$consulta = @mysql_query($sql) or die ($error);
	if(mysql_num_rows($consulta)<=0)//si la consulta tubo exito
	{print'<center><br>No se encontro ningun resultado</center>';}
	else
	{///por falso me llena todos el registro encontrado
	$max = mysql_num_fields($consulta) ;
	echo "<table border=0 >";
	echo "<tr>";//para la cabecera
	for($i = 0; $i < $max; $i++)
	{
		$campos[$i] = @mysql_field_name($consulta, $i);
		//echo "<th>".$campos[$i]."</th>";
	}
	$k = 0;
	while($row = @mysql_fetch_array($consulta))
	{ 
		echo "<tr align='center'";
		if($k % 2 == 0) echo "bgcolor='#d4e5ff'"; 
		echo ">"; $j =0; 

	  for($i = 0; $i < $max; $i++)
		{		
		$datos[$j][$campos[$i]] = $row[$campos[$i]]; 
		$id[$i] = $row[$campos[0]]; 
		//echo "<td align='justify'>". htmlentities($datos[$j][$campos[$i]])."</td>"; 
		//sirve para imprimir todos los datos
		} 
		//parametros que se le agregar para editar por get
		if($tabla=="banners"){
			echo "<td width='100%'><iframe src='todos.php?id=".$row[$campos[0]]."' noresize scrolling='no' id='content' frameborder='0' width='100%'></iframe></td>";
		echo"<td><label onClick='eliminar(".$row[$campos[0]].")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='editar(".$row[$campos[0]].")'><img src='imagenes/edit.png' width='50px' height='50px'></label></td>";//hace una pregunta a la func valida en el evento click
		}else
		if($tabla=='imagen')
		{
		echo"<td width='100%'><label onClick='eliminarImgCurso(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/cursos/".$row[$campos[1]]."' width='250px' height='100px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='eliminarImgCurso(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		}else
		if($tabla=="fondo")
		{
		echo"<td width='100%'><label onClick='eliminarImgFondo(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/fondos/".$row[$campos[1]]."' width='250px' height='100px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='eliminarImgFondo(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		}else
		if($tabla=="etiquetas")
		{
		echo "<td width='100%'><iframe src='eti_todos.php?id=".$row[$campos[0]]."' noresize scrolling='no' id='content' frameborder='0' width='100%'></iframe></td>";
		echo"<td><label onClick='eliminarEtiqueta(".$row[$campos[0]].")'><img src='imagenes/elimin.png' width='50px' height='50px'><label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='editarEtiqueta(".$row[$campos[0]].")'><img src='imagenes/edit.png' width='50px' height='50px'></label></td>";//hace una pregunta a la func valida en el evento click
		}
		else
		if($tabla=="eti_imagen")
		{
		echo"<td width='100%'><label onClick='eti_eliminarImgFondo(".$row[$campos[0]].",\'" .$row[$campos[1]]. "\")'><img src='imagenes/eti_imagen/".$row[$campos[1]]."' width='250px' height='100px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='eti_eliminarImgFondo(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		}
		

	$k++; $j++;
	}
	echo "</tr>";
	echo "</table>";		
	}
	@mysql_close ($conexion);
	}//en funcion listar
	
	
	
	/*FUNCION PARA BUSCAR UNO SOLO NORMALMENTE SIN IMAGENES*/
/*		function busquedaindividual($q,$tabla,$ced)*/
	function busquedaindividual($tabla,$sentencia)
	{
	$sql=$sentencia;
	$error = "no se pueden mostrar los datos". mysql_error();
	$consulta = @mysql_query($sql) or die ($error);
	if(mysql_num_rows($consulta)<=0)//si la consulta tubo exito
	{print'<center><br>No se encontro ningun resultado</center>';}
	else
	{///por falso me llena todos el registro encontrado
	$max = mysql_num_fields($consulta) ;
	echo "<table class=table3 border=0 width=60% align=center>";
	echo "<thead><tr>";//para la cabecera
	for($i = 0; $i < $max; $i++)
	{
		$campos[$i] = @mysql_field_name($consulta, $i);
		//echo "<th>".$campos[$i]."</th>";
	}
	$k = 0;
	while($row = @mysql_fetch_array($consulta))
	{ 
		echo "</thead><tr align='center'";
		if($k % 2 == 0) echo "bgcolor='#d4e5ff'"; 
		echo ">"; $j =0; 

	  for($i = 0; $i < $max; $i++)
		{		
		$datos[$j][$campos[$i]] = $row[$campos[$i]]; 
		$id[$i] = $row[$campos[0]]; 
		echo "<td align='justify'>". htmlentities($datos[$j][$campos[$i]])."</td>"; 
		//sirve para imprimir todos los datos
		} 
		//parametros que se le agregar para editar por get
		if($tabla=="banners"){
		echo"<td><label onClick='eliminar(".$row[$campos[0]].")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='editar(".$row[$campos[0]].")'><img src='imagenes/edit.png' width='50px' height='50px'></label></td>";//hace una pregunta a la func valida en el evento click
		}else
		if($tabla=="imagen")
		{
		//	echo "$tabla CUR";
		echo"<td width='100%'><label onClick='eliminarImgCurso(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/cursos/".$row[$campos[1]]."' width='250px' height='100px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='eliminarImgCurso(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		}else
		if($tabla=="fondo")
		{	//echo "$tabla FON";
		echo"<td width='100%'><label onClick='eliminarImgFondo(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/fondos/".$row[$campos[1]]."' width='250px' height='100px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='eliminarImgFondo(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		}else
		if($tabla=="etiquetas"){
		echo"<td><label onClick='eliminarEtiqueta(".$row[$campos[0]].")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='editarEtiqueta(".$row[$campos[0]].")'><img src='imagenes/edit.png' width='50px' height='50px'></label></td>";//hace una pregunta a la func valida en el evento click
		}else
		if($tabla=="usuario")
		{
		echo"<td><label onClick='eliminarUsuario(".$row[$campos[0]].")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='editarUsuario(".$row[$campos[0]].")'><img src='imagenes/edit.png' width='50px' height='50px'></label></td>";//hace una pregunta a la func valida en el evento click			
		}if($tabla=="eti_imagen"){
		echo"<td width='100%'><label onClick='eti_eliminarImgFondo(".$row[$campos[0]].",\'" .$row[$campos[1]]. "\")'><img src='imagenes/eti_imagen/".$row[$campos[1]]."' width='250px' height='100px'></label></td>";  //parametros que se le agregar para editar por get
		echo"<td><label onClick='eti_eliminarImgFondo(".$row[$campos[0]].",\"".$row[$campos[1]]."\")'><img src='imagenes/elimin.png' width='50px' height='50px'></label></td>";  //parametros que se le agregar para editar por get
		}
		
		
	$k++; $j++;
	}
	echo "</tr>";
	echo "</table>";		
	}
	@mysql_close ($conexion);
	}//en funcion buscar NORMALMENTE
		
		//funcion eliminar registro
	function eliminar_banner($valor,$tabla,$nomImg)
	{	if($tabla=="usuarios")
		{
			$sql =("DELETE FROM $tabla WHERE idPer=$valor");	
			$consulta=@mysql_query($sql) or die ("Error".mysql_error());
			if($consulta)
				{ echo"<center><h2>Registro eliminado con exito.... redireccionando</h2></center>";
				  ?><!--script language="Javascript">setTimeout("location.href='modusu.php'", 3000);</script-->
				  <script language="Javascript">alert("Registro eliminado con exito");</script>
				  <?php
			}else
				{ echo "El registro no puede ser eliminado";}
		}else
		if($tabla=="banners" || $tabla=="etiquetas"){
		$sql =("DELETE FROM $tabla WHERE id=$valor");
		$consulta=@mysql_query($sql) or die ("Error".mysql_error());
//		$consulta=@mysql_query($sql) or die ($error);
		if($consulta)	
		{  echo"<center><br><br><br><h3 style='color:#1BC31B;'>Registro eliminado con exito</h3></center>";
			//valida al momento de elminar a donde se va a redireccionar
			if($tabla=="banners")
				{?><script language="Javascript">$("#menImg").load("listarbanners.php");//setTimeout("location.href='listarbanners.php'", 2300);</script><?php 				
				}
			else{?><script language="Javascript">$("#menImg").load("eti_listarbanners.php");//setTimeout("location.href='eti_listarbanners.php'", 2300);</script><?php }
		}
		}else		
		if($tabla=="fondo")
		{
			//echo"fondo";
			//busco y luego elimino		
			$sql="SELECT fondo FROM banners WHERE fondo LIKE '%$valor%'";		
			$error = ":)". mysql_error();
			$consulta = @mysql_query($sql) or die ($error);
			if(mysql_num_rows($consulta)<=0)//si la imgane no esta asociada a ningun banner
			{
				//print'<center><br>No se encontro ningun resultado puede eliminar la imagen</center>';
				/*elimina de tabla y de disco*/
				$sql =("DELETE FROM $tabla WHERE id=$valor");
				$consulta=@mysql_query($sql) or die ("Error".mysql_error());
				//$consulta=@mysql_query($sql) or die ($error);
				if($consulta)	
				{  echo"<center><br><br><br><h4 style='color:#1BC31B;'>Fondo de banner eliminado con éxito</h4></center>";
					$dir="imagenes/fondos/$nomImg";
				   if(unlink($dir)) 
				   print "<center><br>El archivo fue borrado del disco duro"; 
  				   else
				   print "<center><br>Error: No se pudo borrar la imagen del disco duro"; 
				}				
				/*fin elimina*/			
			}
			else
			{print"<center><br><h4 style='color:red;'>La imagen esta asociada a otro banner y no puede ser eliminada</h4></center>";
			?>
            <script language="Javascript">alert("La imagen esta asociada a otro banner y no puede ser eliminada");$("#menImg").load("leifondos.php");</script>
			<?php
			
			}
		}else if($tabla=="imagen")
		{
			//busco y luego elimino		
			$sql="SELECT imagen FROM banners WHERE imagen LIKE '%$valor%'";		
			$error = ":)". mysql_error();
			$consulta = @mysql_query($sql) or die ($error);
			if(mysql_num_rows($consulta)<=0)//si la imgane no esta asociada a ningun banner
			{
				//print'<center><br>No se encontro ningun resultado puede eliminar la imagen</center>';
				/*elimina de tabla y de disco*/
				$sql =("DELETE FROM $tabla WHERE id=$valor");
				$consulta=@mysql_query($sql) or die ("Error".mysql_error());
				//$consulta=@mysql_query($sql) or die ($error);
				if($consulta)	
				{  echo"<center><h4 style='color:#1BC31B;'>Imagen de curso eliminado con éxito</h4></center>";
					$dir="imagenes/cursos/$nomImg";
				   if(unlink($dir))
				   	   {  print "<center style='color:#1BC31B;'>El archivo fue borrado del disco duro"; }
				   else{  print "<center style='color:red;'>Error: No se pudo borrar la imagen del disco duro"; }

				}				
				/*fin elimina*/			
			}
			else
			{	print"<center><br><h4 style='color:red;'>La imagen esta asociada a otro banner y no puede ser eliminada</h4></center>";
				?><script language="Javascript">alert("La imagen esta asociada a otro banner y no puede ser eliminada");$("#menImg").load("leicursos.php");</script>
				<?php
			}/*FUNCION PARA ELIMINAR ETIQUETAS*/
			}else if($tabla=="eti_imagen")
		{
			//busco y luego elimino		
			$sql="SELECT imagen FROM etiquetas WHERE imagen LIKE '%$valor%'";		
			$error = "Error :(". mysql_error();
			$consulta = @mysql_query($sql) or die ($error);
			if(mysql_num_rows($consulta)<=0)//si la imgane no esta asociada a ningun banner
			{
				//print'<center><br>No se encontro ningun resultado puede eliminar la imagen</center>';
				/*elimina de tabla y de disco*/
				$sql =("DELETE FROM $tabla WHERE id=$valor");
				$consulta=@mysql_query($sql) or die ("Error".mysql_error());
				//$consulta=@mysql_query($sql) or die ($error);
				if($consulta)	
				{  echo"<center><br><br><br><h4 style='color:#1BC31B;'>Imagen de curso eliminado con éxito</h4></center>";
					$dir="imagenes/eti_imagen/$nomImg";
				   if(unlink($dir)) 
				   print "<center style='color:#1BC31B;'><br>El archivo fue borrado del disco duro"; 
				   else
				   print "<center><br>Error: No se pudo borrar la imagen del disco duro"; 
				?>
				<!--script language="Javascript">setTimeout("location.href='eti_leifondos.php'", 3000);</script-->
                <!--script language="Javascript">alert("Imagen eliminada con exito");$("#menImg").load("eti_leifondos.php");</script-->
				
				<?php 
				}				
				/*fin elimina*/			
			}
			else
			{print"<center><br><h4 style='color:red;'>La imagen esta asociada a otro etiqueta y no puede ser eliminada</h4></center>";
			?>
			<!--script language="Javascript">setTimeout("location.href='eti_leifondos.php'", 2500);</script-->
             <script language="Javascript">alert("La imagen esta asociada a otro banner y no puede ser eliminada");$("#menImg").load("eti_leifondos.php");</script>
			<?php
			}
		}		
	@mysql_close ($conexion);
	}///end clase eliminar

	//valida si la tabla esta vacia
	function valtablavacia($tabla)
	{
		$sql="SELECT * FROM $tabla ";		
		$error = "no se pueden mostrar los datos". mysql_error();
		$consulta = @mysql_query($sql) or die ($error);
		if(mysql_num_rows($consulta)<=0)//si la consulta tubo exito
			{return "false";}//si la tabla esta vacia retorna false
		else
			{ return "true";}//si la tabla tiene algun dato retorna verdadero
	}
	
	function primercampo($tabla)
	{	$bandera="";
		$consulta=mysql_query("SELECT id FROM $tabla WHERE id=(SELECT MIN(id) FROM $tabla)");	
		while($columna=mysql_fetch_array($consulta))
		{	$id=$columna['id'];	
			if($id=="")		
			{$bandera="";}
			else
			{$bandera=$id;}
		}
		return $bandera;
	}
	//valida si un campo existe en una tabla
		function validarRegistro($tabla,$campotabla,$camporecibido)
	{
		$sql="SELECT * FROM $tabla WHERE $campotabla='$camporecibido'";		
		$error = "no se pueden mostrar los datos". mysql_error();
		$consulta = @mysql_query($sql) or die ($error);
		if(mysql_num_rows($consulta)<=0)//si la consulta tubo eno encontro datos
			{return "false";}//sie el campo no existe retorna tru
		else
			{ return "true";}//si el campo existe retorna true
	}
	
	//quita caracteres especiales
	function tildes($cadena)		
	{	$a_tofind = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'à', 'á', 'â', 'ã', 'ä', 'å',
		'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø',
		'È', 'É', 'Ê', 'Ë', 'è', 'é', 'ê', 'ë', 'Ç', 'ç',
		'Ì', 'Í', 'Î', 'Ï', 'ì', 'í', 'î', 'ï',
		'Ù', 'Ú', 'Û', 'Ü', 'ù', 'ú', 'û', 'ü', 'ÿ', 'Ñ', 'ñ',' ','´',"'",">","<");
	
		$a_replac = array('A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a' ,
		 'O', 'O', 'O', 'O', 'O', 'O', 'o', 'o', 'o', 'o', 'o', 'o'   ,
		 'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'C', 'c' ,
		 'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i',
		 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'y', 'N', 'n','_','-','','','');
	
		$nombreImagen = str_replace($a_tofind, $a_replac, $cadena);
		return $nombreImagen;//		me retorna la cadena sin caracteres especiales
	}
	//valida que los si estan en la base de  datos
	function session($id,$tipo)	
	{
	$sql="SELECT * FROM usuarios where corPer='%$id%' && tipPer='%$tipo%'";		
	$error = "no se pueden mostrar los datos". mysql_error();
	$consulta = @mysql_query($sql) or die ($error);
	if(mysql_num_rows($consulta)<=0)//si la consulta tubo exito
			{return "siexiste";}
		else
			{ return "noexiste";}	
	}
	//muestra los mensajes en rojo
	function menRojo($mensaje)
	{
		$men="<center><h3 style='color:red;'> $mensaje </h3><br><h4 > :(</h4></center>";
		?><!--script type="text/javascript"> setTimeout("location.reload()", 4000);</script--><?php
		return $men;
	}
	//muestra los mensajes en verde
	function menVerde($mensaje)
	{
		$men="<center><h3 style='color:#02C925;'> $mensaje </h3><br><h4 > :) </h4></center>";
		?><!--script type="text/javascript"> setTimeout("location.reload()", 4000);</script--><?php
		return $men;
	}
	function val_tamano($cadena,$tipo,$tamaño)
	{
		echo $a=tildes($cadena);
		echo $b=strlen($a);
		if($b<=$tamaño )
			{ 	return "verde";	}
		else
			{	return"rojo";   }
	}
	/*$max=85; 
	$num=strlen($titulo);
	if ($num<=$max){	*/
	
	function valida_email($email)
	{   
	if(eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@(umariana.edu.co)$", $email))   
	  return true;   
    else  
	  return false;
	}
	
	}/*FIN FUNCION GENERAL*/
	

?>
</body>


