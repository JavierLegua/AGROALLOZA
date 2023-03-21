<?php

    Class Campos extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);
    
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso
    
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }
    
            $this->campoModelo = $this->modelo('Campo');
    
            $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista
    
            }
    
            public function index(){
                
                $campos = $this->campoModelo->ObtenerCampos();
                $this->datos['campo'] = $campos;

                $camposEncript = json_encode($campos);

                $this->camEncript['campos'] = $camposEncript;
    
                $this->vista('campos/inicio',$this->datos, $this->camEncript);
    
            }

            public function borrarCampo($id){

                $this->campoModelo->borrarCampo($id);
    
                redireccionar('/Campos');
    
            }

            public function editarCampo(){

                $campoModificado = [
                    'idcampo' => trim($_POST['idcampo']),
                    'nombre' => trim($_POST['nombre']),
                    'partida' => trim($_POST['partida']),
                    'estado_tierra' => trim($_POST['estado_tierra']),
                    'estado_arboles' => trim($_POST['estado_arboles']),
                    'tipo_plantacion' => trim($_POST['tipo_plantacion']),
                ];
    
                $this->campoModelo->actualizarCampo($campoModificado);
                redireccionar('/Campos');
    
            }

            public function anadirCampo(){    
    
                $campoNuevo = [
                    'nombre' => trim($_POST['nombre']),
                    'partida' => trim($_POST['partida']),
                    'estado_tierra' => trim($_POST['estado_tierra']),
                    'estado_arboles' => trim($_POST['estado_arboles']),
                    'tipo_plantacion' => trim($_POST['tipo_plantacion']),
                ];
    
                $this->campoModelo->addCampo($campoNuevo);
                redireccionar('/Campos');
    
            }
    }

?>