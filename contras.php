<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link type="text/css" rel="stylesheet" href="contrasena.css">
<script src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="efectopciones.js"></script>
</head>

<body id="cr">
<h3>Olvido su contraseña</h3>
<p>Completa los campos para restaurar la constraseña</p>
<div>
<table width="200" border="0" align="center">
  <tr>
    <td><label for="txtCed">Cedula:<br>
    </label>
      <input type="text" name="txtCed" id="txtCed" placeholder="cedula" required></td>
    </tr>
  <tr>
    <td>Ingrese su correo:</td>
    </tr>
  <tr>
    <td><input type="email" name="txtCor" id="txtCor" placeholder="correo@umariana.edu.co" required></td>
    </tr>
  <tr>
    <td><input type="button" name="submit" id="submit" value="Enviar" onClick="recordarcon()"></td>
    </tr>
</table>
</div>
<div id="respuesta"></div>
</body>
</html>