<?php 
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//require "$root/sistemadecitas-main/app/config.php";
session_start();

if (isset($_SESSION['username']))
{                     
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}


$id = $_SESSION['row']['id'];
$fecha = $_SESSION['fecha'];

function VerificarPorDia($a,$b){

    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require "$root/config.php";
    $sql_show = "select * from (select prueba_citas.id_citas, prueba_citas.fecha, prueba_citas.id_paciente, medicos.nombre_medico, users.nombre, prueba_citas.motivo, medicos.id from (((medicos inner join prueba_citas on prueba_citas.id_medico = medicos.id) inner join complejos on medicos.id_complejo=complejos.id) inner join users on prueba_citas.id_paciente=users.id_users)) as T where id = '$b' AND fecha LIKE '%{$a}%' order by fecha ASC";
    $mostrar_citas = mysqli_query($link, $sql_show);
    $row = mysqli_fetch_array($mostrar_citas);
    while($row = mysqli_fetch_array($mostrar_citas)){
        //echo $row['id_citas'];
        //echo "<br>";
        //echo $row['fecha'];
        //echo "<br>";
        //echo $row['nombre_medico'];
            ?>
    
            <section class="cuerpo3">
                <div class="mas-detalles3">
                    <hr>               
                    <p>Nombre de Paciente:</p>
                    <p><?php echo $row['nombre'];?></p>
                    <hr>
                    <p>Fecha:</p>
                    <p><?php echo $row['fecha'];?></p>
                    <hr>
                    <p>Motivo de Cita:</p>
                    <p><?php echo $row['motivo'];?></p>
                    <hr>
                
                </div>
    
            </section>
    
            
            <?php
            
        }
    }
            ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Recientes</title>

    <?php 
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    ?>

    <link rel="stylesheet" href="<?php $root;?>/Design/CSS/Citas_Recientes_Medico.css">
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
        <?php VerificarPorDia($fecha,$id);?>
        <section class="cuerpo">
            <div class="mas-detalles">
                <img class="user_info" src="<?php $root;?>/Design/Image/usuario.png" alt="">
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']);?></h2>
            </div>
        </section>
        <section class="menu_sistema">
            <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href="Citas_Recientes_Medico.php"><font color="#2ECC71">Citas Recientes</font></a></h3>
                <h3><a class="btn_reservarcitahover" href="<?php $root;?>/Views/Home/pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
    <form method = "post" action="Reservar_Cita_PoliclinicaJJBallarino.php">
        
    
    </form>
        <section class="cuerpo2">
            <div class="mas-detalles2">
                <p>No. de Seguro Social:</p>
                <p><?php //echo $_SESSION['cedula'];?></p>
                <hr>
                <p>Correo Electrónico:</p>
                <p></p>
                <hr>
                <p>Teléfono:</p>
                <p><?php //echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
            </div>
        </section>
        
        <section>
            <div class="ir_atras">
                <a href="<?php $root;?>/logout.php" ><img class="botonatras" src="<?php $root;?>/Design/Image/icono_salir.png" alt=""></a>
                <p class="texto_salir">Salir</p>
            </div>
            <div class="boton_editar">
                <a href=""><p class="edit">Editar</p></a>
                <a href=""><p class="delet">Eliminar</p></a>
            </div>
        </section>
        
        
        
        
    </main>



</body>
</html>