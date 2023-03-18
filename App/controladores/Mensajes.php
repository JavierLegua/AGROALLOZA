<?php

    class Mensajes extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1,2,3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->mensajeModelo = $this->modelo('Mensaje');

            $this->datos['menuActivo'] = 3;   
        }

        public function index(){

            //Obtenemos los usuarios
            $usuarios = $this->mensajeModelo->obtenerUsuarios();

            $this->datos['usuario'] = $usuarios;

            $this->vista('mensajes/inicio',$this->datos);
        }

        public function enviarMensaje(){

            $to = $_POST['usuario'];
            $nombreTo = "Usuario";
            $asunto = $_POST['asunto'];
            $cuerpo = $_POST['cuerpo'];

            $respuesta = EnviarEmail::sendEmail($to,$nombreTo,$asunto,$cuerpo);

                if ($respuesta == '1') {
                    redireccionar("/mensajes");
                }else{
                    echo "No se ha podido enviar el mensaje. Error: $respuesta";
                }

        }

    }

?>