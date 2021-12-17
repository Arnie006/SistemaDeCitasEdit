<?php
session_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/config.php";



class Usuarios{
    function registrarUser($a,$b,$c,$d,$e,$f){

        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        require "$root/config.php";
        
        $success = FALSE;

        $user_check_query = "SELECT * FROM users WHERE username='$a'";
        $result = mysqli_query($link, $user_check_query);
        $user = mysqli_fetch_assoc($result);    
        
        if ($user['username'] === $a) {
            $_SESSION['error'] = "El usuario ya existe";
            return $success;
            header('location:error.php');
            }else{
                $sql_registro = "insert into users (username, password, nombre, apellido, correo, telefono) values ( '$a', '$d', '$b', '$c', '$e', '$f');";
                mysqli_query($link, $sql_registro);
                $success = TRUE;
                return $success;
                header("location:http://localhost:81/index.php");
            }
        
        
        }
        
    function addCita($a,$b,$c,$d){
            $root = realpath($_SERVER["DOCUMENT_ROOT"]);
            require "$root/config.php";
            $cita_check_query = "SELECT fecha FROM prueba_citas WHERE fecha='$b' and id_medico='$a'";
            $result = mysqli_query($link, $cita_check_query) or die (mysqli_error($link));
            $cita = mysqli_fetch_assoc($result);  
        
            $success = FALSE;

            if ($cita['fecha'] === $b){
                $_SESSION['error'] = "El doctor ya tiene una cita para el horario seleccionado";
                return $success;
                header('location: error.php');
            }else{
                $addcita_sql = "insert into prueba_citas (fecha, id_paciente, correo_paciente, id_medico) values ('$b', '$c', '$d', '$a');"; 
                $query = mysqli_query($link, $addcita_sql);

                $success = TRUE;
                return $success;
                
                header("location: confirmacion.php");
            
            }
        
        
        
        }
        
    function editarCita($a,$b,$c){   
            $root = realpath($_SERVER["DOCUMENT_ROOT"]);
            require "$root/config.php"; 
            $cita_check_query = "SELECT fecha FROM prueba_citas WHERE fecha='$a' and id_medico='$c'";
            $result = mysqli_query($link, $cita_check_query) or die (mysqli_error($link));
            $cita = mysqli_fetch_assoc($result);  
        
            $success = FALSE;

            if ($cita['fecha'] === $a){
                $error = "El doctor ya tiene una cita para el horario seleccionado";
            }else{
                $addcita_sql = "UPDATE prueba_citas set fecha = '$a' where id_citas =".$b; 
                $query = mysqli_query($link, $addcita_sql);

                $success = TRUE;
                return $success;
                
                header("location: confirmacion.php");
            
            }
        }


}
