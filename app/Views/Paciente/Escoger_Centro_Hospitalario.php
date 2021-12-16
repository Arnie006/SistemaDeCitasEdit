<?php session_start()?>
<?php
if (!isset($_SESSION['nombre_user']))
{                     
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Electrónico de Citas</title>

    <link rel="stylesheet" href="Escoger_Centro_Hospitalario.css">
    <link rel="shortcut icon" href="logo_css.png" type="image/x-icon">
</head>

<body>

    <header>
        <nav>

            <!--logo-->
            <div>
            <a href=""><img class="logo" src="circulo_fondo_logo_css.png" alt="Spoilers"></a>
            <!--menu-->
            </div>
            <ul>
                <h1 class="det">Sistema Electrónico de Citas</h1>
                <a href="LoginorSignin.html"><img class="user" src="usuario.png" alt=""></a>
            </ul>
        </nav>
    </header>

    <main>
        <section class="cuerpo">
            <div class="mas-detalles">
                <img class="user_info" src="usuario.png" alt="">
                <h2>Buen dia, <?php echo implode(', ', $_SESSION['nombre_user']); echo ' '; echo implode(', ', $_SESSION['apellido_user']); ?></h2>
            </div>
        </section>
        <section class="menu_sistema">
            <div class="div_menu_sistema">
                <h3><a class="btn_reservarcitahover" href="#"><font color="#2ECC71">Reservar Citas</font></a></h3>
                <h3><a class="btn_reservarcitahover" href="citasrecientes.php">Citas Recientes</a></h3>
                <h3><a class="btn_reservarcitahover" href="pfcontacto.php">Contáctenos</a></h3>
            </div>
        </section>


        <section class="hora_cita_sistema">
            <div class="hora_cita">
                <p>Escoja el Centro Medico de su Preferencia:</p>

                <form action="Reservar_Cita_PoliclinicaJJVallarino.php">
                    <button type="submit" class="btn_1">
                        Policlínica J.J. Vallarino
                    </button>
                </form>
                <form action="Reservar_Cita_PoliclinicaCarlosNBrin.php">
                    <button type="submit" class="btn_2">
                        Policlínica Carlos N. Brin
                    </button>
                </form>
                <form action="Reservar_Cita_PoliclinicaManuelFerrerValdes.php">
                    <button type="submit" class="btn_3">
                        Policlínica Manuel Ferrer Valdes
                    </button>
                </form>
                <form action="Reservar_Cita_PoliclinicaDonAlejandrodelaGuardiahijo.php">
                    <button type = "submit" class="btn_4">
                        Policlinica Don Alejandro de la Guardia hijo
                    </button>
                </form>
                <form action="Reservar_Cita_ComplejoHospitalarioArnulfoAM.php">
                    <button type = "submit" class="btn_5">
                        Complejo Hospitalario Arnulfo Arias Madrid
                    </button>
                </form>
            </div>
        </section>

        <section class="boton_enviar_sistema">
            <div class="boton_enviar">
                
            </div>
        </section>
 
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
                <a href="logout.php" ><img class="botonatras" src="icono_salir.png" alt=""></a>
                <p class="texto_salir">Salir</p>
            </div>
        </section>
        
        
        
        
    </main>



</body>
</html>