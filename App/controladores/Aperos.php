<?php

    Class Aperos extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);
    
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso
    
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }
    
            $this->aperoModelo = $this->modelo('Apero');
    
            $this->datos['menuActivo'] = 2; 

        }

        public function index(){
            
            $aperos = $this->aperoModelo->obtenerAperos();

            $apeEncript = json_encode($aperos);

            $this->apeEncript['aperos'] = $apeEncript;

            $this->datos['apero'] = $aperos;

            $this->vista('aperos/inicio', $this->datos, $this->apeEncript);
        }

        public function borrarApero($id){

            $this->aperoModelo->borrarApero($id);

            redireccionar('/Aperos');

        }

        public function editarApero(){

            // print_r($_POST);exit();

            $aperoModificado = [
                'idapero' => trim($_POST['idapero']),
                'modelo' => trim($_POST['modelo']),
                'matricula' => trim($_POST['matricula']),
                // 'foto' => trim($_POST['foto']),
            ];

            $this->aperoModelo->actualizarApero($aperoModificado);
            redireccionar('/Aperos');

        }

        public function anadirApero(){

            $aperoNuevo = [
                'modelo' => trim($_POST['modelo']),
                'matricula' => trim($_POST['matricula']),
                // 'foto' => trim($_POST['foto']),
            ];

            $this->aperoModelo->addApero($aperoNuevo);
            redireccionar('/Aperos');

        }

    }

?>