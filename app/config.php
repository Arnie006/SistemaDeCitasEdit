<?php
define('DB_SERVER', 'localhost:3000');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Fito!3995799');
define('DB_NAME', 'ingweb');

// Conectar a la bdd
$link = new mysqli("mysql", "root", "Fito!3995799", "ingweb");
return $link;
 
// Revisar conexion
if($link === false){
    die("Error de conexión " . mysqli_connect_error());
}
?>