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
    
            public function index($pagina = 0){
    
                $registrosPorPagina = 2;
                $pagina = intval($pagina + 1);
                $numCampos = $this->campoModelo->contarCampos();

                $numPagTotal = ceil($numCampos / $registrosPorPagina);

                $min = ($registrosPorPagina * $pagina) - ($registrosPorPagina);

                // $camposEncript = json_encode($campos1);

                
                $campos = $this->campoModelo->ObtenerCampos();
                $campos1 = $this->campoModelo->ObtenerCampos(-1, 0);
                $this->numPaginas = $numPagTotal;
                $this->datos['campo'] = $campos;
    
                $this->vista('campos/inicio',$this->datos, $this->numPaginas);
    
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