<?php
session_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/sistemadecitas-main/app/config.php";

function registrarUser($a,$b,$c,$d,$e,$f){

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/sistemadecitas-main/app/config.php";


$user_check_query = "SELECT * FROM users WHERE username='$a'";
$result = mysqli_query($link, $user_check_query);
$user = mysqli_fetch_assoc($result);    

if ($user['username'] === $a) {
    $_SESSION['error'] = "El usuario ya existe";
    header('location:error.php');
    }else{
        $sql_registro = "insert into users (username, password, nombre, apellido, correo, telefono) values ( '$a', '$d', '$b', '$c', '$e', '$f');";
        mysqli_query($link, $sql_registro);
        header('location: login.php');
    }


}

function addCita($a,$b,$c,$d){
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require "$root/sistemadecitas-main/app/config.php";
    $cita_check_query = "SELECT fecha FROM prueba_citas WHERE fecha='$b' and id_medico='$a'";
    $result = mysqli_query($link, $cita_check_query) or die (mysqli_error($link));
    $cita = mysqli_fetch_assoc($result);  

    if ($cita['fecha'] === $b){
        $_SESSION['error'] = "El doctor ya tiene una cita para el horario seleccionado";
        header('location:error.php');
    }else{
        $addcita_sql = "insert into prueba_citas (fecha, id_paciente, correo_paciente, id_medico) values ('$b', '$c', '$d', '$a');"; 
        $query = mysqli_query($link, $addcita_sql);
        header("location: confirmacion.php");
    
    }



}

function editarCita($a,$b,$c){

    $cita_check_query = "SELECT fecha FROM prueba_citas WHERE fecha='$a' and id_medico='$c'";
    $result = mysqli_query($link, $cita_check_query) or die (mysqli_error($link));
    $cita = mysqli_fetch_assoc($result);  

    if ($cita['fecha'] === $a){
        $error = "El doctor ya tiene una cita para el horario seleccionado";
    }else{
        $addcita_sql = "UPDATE prueba_citas set fecha = '$a' where id_citas =".$b; 
        $query = mysqli_query($link, $addcita_sql);
        header("location: confirmacion.php");
    
    }
}