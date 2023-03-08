<?php

    class AveriasAperos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->averiaAperoModelo = $this->modelo('AveriaApero');

            $this->datos['menuActivo'] = 2;   

        }

        public function index($id){
            $averias = $this->averiaAperoModelo->obtenerAverias($id);
            $aperos = $this->averiaAperoModelo->obtenerAperos();
            $this->datos['averiaAperos'] = $averias;
            $this->datos['apero'] = $aperos;
            $this->datos['id'] = $id;


            $this->vista('averiasAperos/inicio', $this->datos);
        }

        public function borrar($id){

            $this->averiaAperoModelo->borrarAveria($id);

            redireccionar('/Aperos');
        }

        public function anadirAveria(){

            $averiaNueva = [
                'descripcion' => trim($_POST['tipo']),
                'lugar_reparacion' => trim($_POST['lugar']),
                'precio_reparacion' => trim($_POST['precio']),
                'fecha' => trim($_POST['fecha']),
                'idapero' => trim($_POST['id']),
            ];

            $this->averiaAperoModelo->addAveria($averiaNueva);
            redireccionar('/Aperos');
        }
    }
    

?>