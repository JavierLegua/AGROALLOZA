<?php

    class Maquinas extends Controlador{
        
        public function __construct(){

        Sesion::iniciarSesion($this->datos);

        $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
            redireccionar('/');
        }

        $this->maquinaModelo = $this->modelo('Maquina');

        $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista

        }

        public function index(){

            $maquinas = $this->maquinaModelo->obtenerMaquinas();
            $this->datos['maquina'] = $maquinas;

            $this->vista('maquinas/inicio',$this->datos);

        }

        public function borrarMaquina($id){

            $this->maquinaModelo->borrarMaquina($id);

            redireccionar('/Maquinas');

        }

        public function editarMaquina(){

            $maquinaModificado = [
                'idmaquina' => trim($_POST['idmaquina']),
                'modelo' => trim($_POST['modelo']),
                'matricula' => trim($_POST['matricula']),
                'horas' => trim($_POST['horas']),
            ];

            $this->maquinaModelo->actualizarMaquina($maquinaModificado);
            redireccionar('/Maquinas');

        }

        public function anadirMaquina(){

            $dir="/sites/AGROALLOZA/public/img/datosBBDD/";

            move_uploaded_file($_FILES['imagen']['tmp_name'], $dir.$_FILES['imagen']['name']);

            $maquinaNueva = [
                'modelo' => trim($_POST['modelo']),
                // 'imagen' => $_FILES['imagen']['name'],
                'matricula' => trim($_POST['matricula']),
                'horas' => trim($_POST['horas']),
            ];

            $this->maquinaModelo->addMaquina($maquinaNueva);
            redireccionar('/Maquinas');

        }

        public function subirFoto($id){

            if($_SERVER['REQUEST_METHOD'] =='POST'){
    
                $dir="/var/www/html/Tragamillas/mvc_completo/public/img/datosBBDD/";
                
                // print_r($_FILES['imagen']['name']);exit();
    
                move_uploaded_file($_FILES['imagen']['tmp_name'], $dir.$_FILES['imagen']['name']);

                $id = $this->datos['usuarioSesion']->id_usuario;
    
                $fotoNueva = [
                    'imagen' => $_FILES['imagen']['name']
                ];

                // print_r($fotoNueva); exit();
                if($this->usuarioModelo->agregarFoto($id, $fotoNueva)){
                    // print_r($licenciaNueva);exit();
                    redireccionar('/perfiles');
                }else{
                    die('Algo ha fallado!!');
                }
        }
    }

    }

?>