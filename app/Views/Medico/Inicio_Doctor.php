<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/config.php";
session_start();?>
<?php
if (isset($_SESSION['username']))
{                     
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

$fecha = "";




if (isset($_POST['boton_enviar'])){
    $fecha = mysqli_real_escape_string($link,$_POST['fecha']);
    $_SESSION['fecha'] = $fecha ?? "";
    header("location: Citas_Recientes_Medico.php");
    //VerificarPorDia();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>

    <?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    ?>

    <link rel="stylesheet" href="<?php $root;?>/Design/CSS/Inicio_Doctor.css">
    <link rel="shortcut icon" href="<?php $root;?>/Design/Image/logo_css.png" type="image/x-icon">
</head>

<body>

    <header>
        <nav>

            <!--logo-->
            <div>
            <a href=""><img class="logo" src="<?php $root;?>/Design/Image/circulo_fondo_logo_css.png" alt=""></a>
            <!--menu-->
            </div>
            <ul>
                <h1 class="det">Sistema Electrónico de Citas</h1>
                <a href="#"><img class="user" src="<?php $root;?>/Design/Image/usuario.png" alt=""></a>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cuerpo">
            <div class="mas-detalles">
                <img class="user_info" src="<?php $root;?>/Design/Image/usuario.png" alt="">
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']);?></h2>
            </div>
        </section>
        <section class="menu_sistema">
            <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href="">Citas Recientes</a></h3>
                <h3><a class="btn_reservarcitahover" href="<?php $root;?>/Views/Home/pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
        <section class="nombre_hospital_sistema">
            <div class="nombre_hospital">
                <h3>Ver Citas Recientes</h3>
            </div>
        </section>
    <form method = "post" action="Inicio_Doctor.php">
        
        <section class="menu_fecha_sistema">
            <div class="menu_fecha">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha"
                    value="<?php echo $fecha; ?>"
                    min="2021-08-12" max="2022-08-12" required>
            </div>
        </section>
        
        



        <section class="cuerpo2">
            <div class="mas-detalles2">
                <p>No. de Seguro Social:</p>
                <p><?php //echo $_SESSION['cedula'];?></p>
                <hr>
                <p>Correo Electrónico:</p>
                <p><?php //echo implode(', ', $_SESSION['correo_user']);?></p>
                <hr>
                <p>Teléfono:</p>
                <p><?php //echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
            </div>
        </section>

        
        <section>
            <div class="ir_atras">
                <a href='<?php $root;?>/logout.php'><img class="botonatras" src="<?php $root;?>/Design/Image/icono_salir.png" alt=""></a>
                <p class="texto_salir">Salir</p>
            </div>
            <div class="boton_enviar">
                <input name="boton_enviar" type="submit" class="btn_enviar">Enviar</button>
            </div>
            <div class="boton_ver">
                <button name="boton" type="submit" value="HTML" class="btn_ver">Ver Citas</button>
            </div>
        </section>
        
        </form>    
        
        
    </main>



</body>
</html>