<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php 

function valida_email($email)
{   
  if(eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@(umariana.edu.co)$", $email))   
  return true;   
    else  
  return false;
}
$mail = "asda911.smail@umariana.edu.co";
	if(valida_email($mail))
		{ 
			echo "El mail es valido"; 
		} else 
		{ 
			echo "El mail NO es valido"; 
		} 

 ?>
</body>
</html>