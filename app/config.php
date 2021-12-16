<?php
define('DB_SERVER', 'localhost:3000');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Fito!3995799');
define('DB_NAME', 'ingweb');

// Conectar a la bdd
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Revisar conexion
if($link === false){
    die("Error de conexión " . mysqli_connect_error());
}
?>