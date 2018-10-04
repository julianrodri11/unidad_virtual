<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ingreso al sistema</title>
</head>
<link rel="stylesheet" type="text/css" href="log.css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"  ></script>
<script type="text/javascript" src="efectopciones.js" ></script>

<body>
<div id="contenedor">
<div id="izq">
	
</div><!--FIN IZQUIERDP-->
<div id="der">

<div id="frm">
<form  method="post" action="prologin.php" >
  <table  align="center" width="100px" border="0">
    <tr>
      <td align="right" valign="middle"  ><img src="imagenes/usuario.png" width="50"></td>
      <td >
      <input type="text" name="user" id="user" required="required" placeholder="correo@mail.com"></td>
    </tr>
    <tr>
      <td align="right" valign="middle"><img src="imagenes/contrasena.png" width="70"></td><td>
      <input type="password" name="pw" id="pw" required="required" placeholder="*********"></td>
    </tr>
    <tr>
      <td colspan="2" ><a href="contras.php"> <img id="olcon" src="imagenes/olcon.png" width="135"></a></td>

    </tr>
    <tr>
        <td align="right" ><input type="submit" name="button" id="btnEnviar" value="Enviar">
			</td>
	    <td valign="middle" ><input type="button" id="btnEnv" value="Registrarse" onClick="registrar()"></a>
        	</td>
    </tr>
    <tr>
    	<td colspan="2">
	        <div id="menImg"></div>
        </td>
    </tr>
</table>
</form>
</div><!--fin fomr1-->
</div><!--FIN DERECHO-->

</div>


</body>
</html>