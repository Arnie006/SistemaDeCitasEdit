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
    <meta http-equiv="refresh" content="3;url=./Escoger_Centro_Hospitalario.php" />
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
        <p>Cita agendada correctamente, redirigiendo en 3s...</p>
    </main>



</body>
</html>