<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 
$cadenaConAcentos = 'Ésta es una cadena con eñes y áéÍöÜ, Barça,etc.';
$a_tofind = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'à', 'á', 'â', 'ã', 'ä', 'å'
   , 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø'
   , 'È', 'É', 'Ê', 'Ë', 'è', 'é', 'ê', 'ë', 'Ç', 'ç'
   , 'Ì', 'Í', 'Î', 'Ï', 'ì', 'í', 'î', 'ï'
   , 'Ù', 'Ú', 'Û', 'Ü', 'ù', 'ú', 'û', 'ü', 'ÿ', 'Ñ', 'ñ');
$a_replac = array('A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a'
   , 'O', 'O', 'O', 'O', 'O', 'O', 'o', 'o', 'o', 'o', 'o', 'o'
   , 'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'C', 'c'
   , 'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'
   , 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'y', 'N', 'n');
$cadenaSinAcentos = str_replace($a_tofind, $a_replac, $cadenaConAcentos);
echo $cadenaSinAcentos;
?>
</body>
</html>