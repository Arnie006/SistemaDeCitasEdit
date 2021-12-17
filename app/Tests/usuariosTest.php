<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once "$root/Views/Paciente/funciones.php";
use \PHPUnit\Framework\TestCase;

class usuariosTest extends TestCase {

        public function testRegistrarUser(){
            $usuarios = new Usuarios();
            $this->assertEquals(TRUE, $usuarios->registrarUser('8-940-1460', 'Roberto', 'Bonilla', 'password12345', 'r.bonilla@gmail.com', '66551234' ));

        }

        public function testAddCita(){
            $usuarios = new Usuarios();
            $this->assertEquals(TRUE, $usuarios->AddCita(2, '2021-12-08 13:00:00', 5, 'rbonilla@gmail.com'));

        }

        public function testEditarCita(){
            $usuarios = new Usuarios();
            $this->assertEquals(TRUE, $usuarios->editarCita('2021-12-10 09:00:00',5 ,20 ));

        }

        public function testlogin_usuario(){
            $usuarios = new Usuarios();
            $this->assertEquals(TRUE, $usuarios->login_usuario(1));
        }
}