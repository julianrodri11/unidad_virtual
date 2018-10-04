<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<link type="text/css" rel="stylesheet" href="contrasena.css">
<script type="text/javascript" src="efectopciones.js"></script>
<body id="cm">
<h3>Actualizar mi Contraseña</h3>
<p>Complete los campos</p>
<div>
<table width="200" border="0" align="center">
  <tr>
    <td >Contraseña Antigua</td>
  </tr>
  <tr>
    <td ><input type="text" name="textfield3" id="txtConA"></td>
  </tr>
  <tr>
    <td ><label for="textfield2">Nueva Contraseña:</label>
      <input type="password" name="textfield" id="txtCon1"></td>
  </tr>
  <tr>
    <td ><label for="textfield">Repita Contraseña:</label>
      <input type="password" name="textfield" id="txtCon2"></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    </tr>
  <tr>
    <td ><input type="button"  value="Enviar" id="btnEnv" onClick="actcon()"></td>
    </tr>
</table>
<div id="respuesta"></div>
</div>
</body>
</html>