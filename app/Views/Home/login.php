<?php

require_once "config.php"; //conexion a la bdd
session_start();
$error= "";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    //revisa las variables enviadas desde el form
    
    $myusername = mysqli_real_escape_string($link,$_POST['user']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
    $_SESSION['cedula'] = $myusername;

    //revisa el id del usuario que se intenta loggear
    $sql = "SELECT id_users FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($link,$sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    $_SESSION['row'] = $row;
    $count = mysqli_num_rows($result);

    //creando variables de sesion para la duracion del proceso
    $sql_nombre = "SELECT nombre FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $nombre_row = mysqli_query($link, $sql_nombre) or die (mysqli_error($link));
    $nombre_sesion = mysqli_fetch_assoc($nombre_row);
    $_SESSION['nombre_user'] = $nombre_sesion;

    $sql_apellido = "SELECT apellido FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $apellido_row = mysqli_query($link, $sql_apellido) or die (mysqli_error($link));
    $apellido_sesion = mysqli_fetch_assoc($apellido_row);
    $_SESSION['apellido_user'] = $apellido_sesion;  
        
    $sql_correo = "SELECT correo FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $correo_row = mysqli_query($link, $sql_correo) or die (mysqli_error($link));
    $correo_sesion = mysqli_fetch_assoc($correo_row);
    $_SESSION['correo_user'] = $correo_sesion;
    
    $sql_telefono = "SELECT telefono FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $telefono_row = mysqli_query($link, $sql_telefono) or die (mysqli_error($link));
    $telefono_sesion = mysqli_fetch_assoc($telefono_row);
    $_SESSION['telefono_user'] = $telefono_sesion;


    //si algo salio en el query de sql, deja loggear a la persona
    if($count == 1) {
        
        header("location: Escoger_Centro_Hospitalario.php");
    }else {
       $error = "*Cédula o contraseña incorrectos. Por favor verifique sus datos e intente nuevamente";
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Iniciar sesión</title>
<link rel="stylesheet" href="pfestilos.css">
<link rel="icon" href="logo1.png">
</head>
<body>
<h1 style="text-shadow: 3px 2px #000000"><img src="logo1.png" width="100" height="100" align="center" style="margin-right: 20px">SISTEMA ELECTRÓNICO DE CITAS</h1>
<form style="font-size:11px; margin-top: 60px; text-align: center" action="#" method="POST">
	<p><?php echo $error;?><br></p> 
    <label for="nombre">Usuario</label><br>
	<input style="text-align: center" type="text" name="user" required><br><br>
	<label for="contrasena">Contraseña</label><br>
	<input style="text-align: center" type="password" name="password" required><br><br><br>
	<input style="font-size:15px; background-color: transparent; color:#78d9ff; border:none; cursor:pointer; font-weight: bold" type="submit" value="Ingresar">
	<br><a href="register.php">Registrarse</a> <br>
    Para medicos: <a href="login_medicos.php">Login Medicos</a>
</form>
<p>

</p>
</body>
</html>