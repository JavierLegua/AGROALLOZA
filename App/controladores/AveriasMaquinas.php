<?php

    class AveriasMaquinas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->averiaMaquinaModelo = $this->modelo('AveriaMaquina');

            $this->datos['menuActivo'] = 2;   

        }

        public function index($id){
            $averias = $this->averiaMaquinaModelo->obtenerAverias($id);
            $maquinas = $this->averiaMaquinaModelo->obtenerMaquinas();
            $this->datos['averia'] = $averias;
            $this->datos['maquina'] = $maquinas;
            $this->datos['id'] = $id;

            $this->vista('averiasMaquinas/inicio', $this->datos);
        }

        public function borrar($id){

            $this->averiaMaquinaModelo->borrarAveria($id);

            redireccionar('/Maquinas');

        }

        public function anadirAveria(){

            $averiaNueva = [
                'descripcion' => trim($_POST['tipo']),
                'num_horas_averia' => trim($_POST['num_horas']),
                'lugar_reparacion' => trim($_POST['lugar']),
                'precio_reparacion' => trim($_POST['precio']),
                'fecha' => trim($_POST['fecha']),
                'idmaquina' => trim($_POST['id']),
            ];

            $this->averiaMaquinaModelo->addAveria($averiaNueva);
            redireccionar('/Maquinas');
        }
    }
    

?>