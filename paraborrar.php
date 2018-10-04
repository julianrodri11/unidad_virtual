<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>
<?php
if(!filter_var("som'eone@example.com", FILTER_VALIDATE_EMAIL))
 {
 echo("E-mail is not valid");
 }
else
 {
 echo("E-mail is valid");
 }
?>

<?php
$var="s'ome(one)@exa\\m'ple.com";

var_dump(filter_var($var, FILTER_SANITIZE_EMAIL));
?>
<?php  
$args = array(  
    'product_id'   => FILTER_SANITIZE_ENCODED,  
    'component'    => array('filter'    => FILTER_VALIDATE_INT,  
                            'flags'     => FILTER_REQUIRE_ARRAY,   
                            'options'   => array('min_range' => 1, 'max_range' => 10)  
                           ),  
    'versions'     => FILTER_SANITIZE_ENCODED  
    );  
  
echo $myinputs = filter_input_array(INPUT_POST, $args);  ?>