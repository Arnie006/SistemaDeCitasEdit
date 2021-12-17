<?php 
require "funciones.php";
//inicializa las variables
$username = "";
$nombre   = "";
$apellido = "";
$password = "";
$tel      = "";
$email   = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username =  mysqli_real_escape_string($link,$_POST['username']);
    $nombre = mysqli_real_escape_string($link,$_POST['nombre']);
    $apellido = mysqli_real_escape_string($link,$_POST['apellido']);
    $password = mysqli_real_escape_string($link,$_POST['password']);    
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $tel = mysqli_real_escape_string($link,$_POST['tel']); 
    if (!preg_match('/^[0-9-]+$/D', $username)){
        $_SESSION['error'] = "Error en caracteres para nombre de usuario, solo puede usar Numeros y '-'"; 
        header('location:error.php');

    }elseif(!preg_match('/^[a-zA-Z\.]*$/', $nombre)){
        $_SESSION['error'] = "Error en caracteres para Nombre, usar unicamente valores de A-z"; 
        header('location:error.php');

    }elseif(!preg_match('/^[a-zA-Z\.]*$/', $apellido)){
        $_SESSION['error'] = "Error en caracteres para Apellido, usar unicamente valores de A-z"; 
        header('location:error.php');

    }elseif(!preg_match('/^[0-9-]+$/D',$tel)){
        $_SESSION['error'] = "Error en caracteres para Telefono, usar unicamentre valores numericos"; 
        header('location:error.php');
    }else{
        $funcion = new Usuarios();
        $funcion->registrarUser($username,$nombre,$apellido,$password,$email,$tel); 

    }

}

?>

<html>
<head>
<meta charset="UTF-8">
<title>Registrarse</title>

<?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    
?>

<link rel="stylesheet" href="<?php $root;?>/Design/CSS/pfestilos.css">
<link rel="icon" href="<?php $root;?>/Design/Image/logo1.png">
</head>
<body>
<h1><img src="<?php $root;?>/Design/Image/logo1.png" width="100" height="100" align="center" style="margin-right: 20px">SISTEMA ELECTRÓNICO DE CITAS</h1><br>
<a href="<?php $root;?>/Views/Home/pfcontacto.php" style="bottom:0; right:0; right:0; text-align:right; font-size:12px">Contáctenos</a>
<p style="font-size:25px; text-align: center">¡Bienvenido!<br>Por favor llene los campos para registrarse</p><br>
<table align="center">
<tr>
<td>
<form method = "post" action="register.php">
	<label for="nombre">Nombre</label><br>
	<input type="text" name="nombre"  value="<?php echo $nombre; ?>"><br><br>
	<label for="apellido">Apellido</label><br>
	<input type="text" name="apellido"  value="<?php echo $apellido; ?>"><br><br>
    <label for="email">Correo electrónico</label><br>
	<input type="text" name="email" required  value="<?php echo $email; ?>"><br><br>
	<label for="password">No. Telefónico (Escribalo sin -)</label><br>
	<input type="tel" name="tel" required  value="<?php echo $tel; ?>"><br><p>
    <?php echo $error;?></p><br>    
	<label for="username">No. de Cédula</label><br>
	<input type="text" name="username" required  value="<?php echo $username; ?>"><br><br>
	<label for="password">Contraseña</label><br>
	<input type="password" name="password" required  value="<?php echo $password; ?>"><br><br>
	<input style="font-size:15px; background-color: transparent; color:#78ffb0; border:none; cursor:pointer; font-weight: bold" type="submit" name="reg_user" value="Registrarse">
</form>
</td>
</tr>
</table><br><br>
<a href="<?php $root;?>/index.php" style="bottom:0; left:0; right:0; text-align:left; font-size:12px">Regresar</a>
</body>
</html>