<?php

    class MantenimientosMaquinas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->mantenimientoMaquinaModelo = $this->modelo('MantenimientoMaquina');

            $this->datos['menuActivo'] = 2;   

        }

        public function index($id){
            $mantenimientos = $this->mantenimientoMaquinaModelo->obtenerMantenimientos($id);
            $maquinas = $this->mantenimientoMaquinaModelo->obtenerMaquinas();
            $this->datos['mantenimiento'] = $mantenimientos;
            $this->datos['maquina'] = $maquinas;
            $this->datos['id'] = $id;

            $this->vista('mantenimientosMaquinas/inicio', $this->datos);
        }

        public function borrar($id){

            $this->mantenimientoMaquinaModelo->borrarMantenimiento($id);

            redireccionar('/Maquinas');

        }

        public function anadirMantenimiento(){

            $mantenimientoNuevo = [
                'tipo' => trim($_POST['tipo']),
                'num_horas' => trim($_POST['num_horas']),
                'lugar' => trim($_POST['lugar']),
                'num_horasproxmant' => trim($_POST['num_horasproxmant']),
                'observaciones' => trim($_POST['observaciones']),
                'fecha' => trim($_POST['fecha']),
                'idmaquina' => trim($_POST['id']),
            ];

            $this->mantenimientoMaquinaModelo->addMantenimiento($mantenimientoNuevo);
            redireccionar('/Maquinas');
        }
    }
    

?>