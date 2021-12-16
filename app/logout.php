<?php
session_start();
 
// Quita todas las variables de sesion
$_SESSION = array();
 
// Elimina la sesion
session_destroy();
 
// Redirige a nuestra pagina principal
header("location: login.php");
exit;
?>