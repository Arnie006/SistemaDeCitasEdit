<?php
session_start();
if (!isset($_SESSION['nombre_user']))
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$fecha ="";
$doctor = "";
$hora = "";
$error = "";
$id = $_SESSION['row']['id_users'];
$correo = $_SESSION['correo_user']['correo'];



if (isset($_POST['ingresar_cita'])){
    $doctor = mysqli_real_escape_string($link,$_POST['doctor']);
    $fecha = mysqli_real_escape_string($link,$_POST['fecha']);
    $hora = mysqli_real_escape_string($link,$_POST['hora']);
    $date = $fecha . $hora;


    addCita($doctor,$date,$id,$correo);
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Citas</title>

    <link rel="stylesheet" href="Design/CSS/Reservar_Cita_PoliclinicaDonAlejandrodelaGuardiahijo.css">
    <link rel="shortcut icon" href="Design/Image/logo_css.png" type="image/x-icon">
</head>

<body>

    <header>
        <nav>

            <!--logo-->
            <div>
            <a href=""><img class="logo" src="Design/Image/circulo_fondo_logo_css.png" alt=""></a>
            <!--menu-->
            </div>
            <ul>
                <h1 class="det">Sistema Electrónico de Citas</h1>
                <a href="#"><img class="user" src="Design/Image/usuario.png" alt=""></a>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cuerpo">
            <div class="mas-detalles">
                <img class="user_info" src="Design/Image/usuario.png" alt="">
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']); echo ' '; echo implode(', ', $_SESSION['apellido_user']); ?></h2>
            </div>
        </section>
        <section class="menu_sistema">
        <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href="Escoger_Centro_Hospitalario.php"><font color="#3498DB">Reservar Citas</font></a></h3>
                <h3><a class="btn_reservarcitahover" href="citasrecientes.php">Citas Recientes</a></h3>
                <h3><a class="btn_reservarcitahover" href="Views/Home/pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>
        <section class="nombre_hospital_sistema">
            <div class="nombre_hospital">
                <h3>Policlínica Don Alejandro de la Guardia hijo</h3>
            </div>
        </section>
        <?php echo $doctor?>
    <form method = "post" action="Reservar_Cita_PoliclinicaDonAlejandrodelaGuardiahijo.php">
        <section class="menu_fecha_sistema">
            <div class="menu_fecha">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha"
                    value="<?php echo $fecha; ?>"
                    min="2021-08-12" max="2022-08-12">
            </div>
        </section>
        <section class="hora_cita_sistema">
            <div class="hora_cita">
                <p>Horario de Atención:</p>
                <select name="hora" id="horadoctor" method = "post" name="eslahoradelahora" class="selec_hora">
                    <option value = " 07:00:00">7:00 - 7:30</option> 
                    <option value = " 07:30:00">7:30 - 8:00</option> 
                    <option value = " 08:00:00">8:00 - 8:30</option> 
                    <option value = " 08:30:00">8:30 - 9:00</option> 
                    <option value = " 09:00:00">9:00 - 9:30</option> 
                    <option value = " 09:30:00">9:30 - 10:00</option> 
                    <option value = " 10:00:00">10:00 - 10:30</option> 
                    <option value = " 10:30:00">10:30 - 11:00</option> 
                    <option value = " 11:00:00">11:00 - 11:30</option> 
                    <option value = "10">---------------------</option> 
                    <option value = " 13:00:00">13:00 - 13:30</option> 
                    <option value = " 13:30:00">13:30 - 14:00</option> 
                    <option value = " 14:00:00">14:00 - 14:30</option> 
                    <option value = " 14:30:00">14:30 - 15:00</option> 
                    <option value = " 15:00:00">15:00 - 15:30</option> 
                    <option value = " 15:30:00">15:30 - 16:00</option> 
                    <option value = " 16:00:00">16:00 - 16:30</option> 
                    <option value = " 16:30:00">16:30 - 17:00</option> 
                    <option value = " 17:00:00">17:00 - 17:30</option> 
                </select>
            </div>
        </section>
        <section class="especialidad_medico_sistema">
            <div class="especialidad_medico">
                <p>Médico:</p>
                <select id = "doctor" name = "doctor" method = "post" name="Especialidades" class="selec_especialidad">
                    <option value = "30">Fernando Samudio (Cardiología)</option> 
                    <option value = "31">Melanie Len (Cardiología)</option> 
                    <option value = "32">Elianne Pauli (Oftalmología)</option>
                    <option value = "33">Manuel Castillo (Oftalmología)</option> 
                    <option value = "34">Vivian Leon (Infectología)</option>  
                    <option value = "35">Elmon Grel (Infectología)</option> 
                    <option value = "36">Cristobal Bolaños (Neuropsicologiía)</option> 
                    <option value = "37">Demetrio Jaramillo (Neuropsicologiía)</option>
                    <option value = "38">Jose Dutari (Pediatría)</option> 
                    <option value = "39">Daniel Marquez (Pediatría)</option>  
                 </select>
            </div>
        </section>
        <section class="motivo_cita_sistema">
            <div class="motivo_cita">
                    <label for="motivocita">Motivo de la Cita:</label><br>
                    <input type="text" id="motcita" name="motcita" class="modifmotcita" required>
            </div>
        </section>
        <section class="boton_enviar_sistema">
            <div class="boton_enviar">
                <input type= "submit" name="ingresar_cita"  class="btn_enviar">
            </div>
        </section>
    </form>
        <section class="cuerpo2">
            <div class="mas-detalles2">
                <p>No. de Seguro Social:</p>
                <p><?php echo $_SESSION['cedula'];?></p>
                <hr>
                <p>Correo Electrónico:</p>
                <p><?php echo implode(', ', $_SESSION['correo_user']);?></p>
                <hr>
                <p>Teléfono:</p>
                <p><?php echo implode(', ', $_SESSION['telefono_user']);?></p>
                <hr>
            </div>
        </section>
        
        <section>
            <div class="ir_atras">
                <a href="Escoger_Centro_Hospitalario.php"><img class="botonatras" src="Design/Image/icono_salir.png" alt=""></a>
                <p class="texto_salir">Salir</p>
            </div>
        </section>
        
        
        
        
    </main>



</body>
</html>