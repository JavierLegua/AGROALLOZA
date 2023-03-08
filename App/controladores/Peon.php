<?php

    class Peon extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->usuarioModelo = $this->modelo('Usuario');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //Obtenemos los usuarios
            $usuarios = $this->usuarioModelo->obtenerUsuarios();

            $this->datos['usuario'] = $usuarios;

            $this->vista('peon/inicio',$this->datos);
            // $this->vista('usuarios/inicioVue',$this->datos);
        }

    }

?>