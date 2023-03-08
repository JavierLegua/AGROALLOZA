<?php

    class MantenimientosAperos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->mantenimientoAperoModelo = $this->modelo('MantenimientoApero');

            $this->datos['menuActivo'] = 2;   

        }

        public function index($id){
            $mantenimientos = $this->mantenimientoAperoModelo->obtenerMantenimientos($id);
            $aperos = $this->mantenimientoAperoModelo->obtenerAperos();
            $this->datos['mantenimiento'] = $mantenimientos;
            $this->datos['apero'] = $aperos;
            $this->datos['id'] = $id;

            $this->vista('mantenimientosAperos/inicio', $this->datos);
        }

        public function borrar($id){

            $this->mantenimientoAperoModelo->borrarMantenimiento($id);

            redireccionar('/Aperos');

        }

        public function anadirMantenimiento(){

            $mantenimientoNuevo = [
                'tipo' => trim($_POST['tipo']),
                'lugar' => trim($_POST['lugar']),
                'precio' => trim($_POST['precio']),
                'observaciones' => trim($_POST['observaciones']),
                'fecha' => trim($_POST['fecha']),
                'idapero' => trim($_POST['id']),
            ];

            $this->mantenimientoAperoModelo->addMantenimiento($mantenimientoNuevo);
            redireccionar('/Aperos');
        }
    }
    

?>