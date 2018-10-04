<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fuente.css</title>
<link type="text/css" rel="stylesheet" href="fuente.css">
<script src="efectopciones.js" type="text/javascript"></script>
</head>

<body>
<?php 
   $idban=$_POST["idban"];
?>

<div id="contp">
	<div id="conts">
    	<div id="fcolor"><input type="color" id="pltcolor" onchange="actualizarcolorfuente('<?php echo $idban; ?>')"/></div>
        <div id="ftamano">
          <p>
            Tamano de la Fuente del título
            <select name="rango" id="rango" onchange="actualizarcolorfuente('<?php echo $idban; ?>')">
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="22">22</option>
              <option value="24">24</option>
              <option value="26">26</option>
              <option value="28">28</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="50">50</option>                            
            </select>
          </p>
        </div>
    </div>
    <div id="conti">
    	<div id="fuentes">

        <?php		
        include_once("funcionbanner.php");
		$con=new funcionbanner();
		$con->conectar();		
		$consulta=mysql_query("SELECT * from fuentes");
		while($filas=mysql_fetch_array($consulta)){
		 $id=$filas['id'];
		 $fuente=$filas['fuente'];
		 $fuente2=str_replace("+"," ",$fuente);
  		 $categoria=$filas['categoria'];		
		 echo"<style>@import url(http://fonts.googleapis.com/css?family=".$fuente.");</style>";
		?>
		<label style="font-family:'<?=$fuente2?>',<?=$categoria?>;" onclick="selFuente('<?php echo $idban; ?>','<?php echo $id;?>')">Muestra de estilo de la fuente</label><br />
		<?php
		}
		?>
        </div>
        
        <div id="btn" onclick="actualizarcolorfuente('<?php echo $idban; ?>')">  Guardar Cambios </div> 
                
    </div>
</div>


</body>
</html>
