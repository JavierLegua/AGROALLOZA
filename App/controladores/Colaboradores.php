<?php

    Class Colaboradores extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);
    
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso
    
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }
    
            $this->colaboradorModelo = $this->modelo('Colaborador');
    
            $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista
    
            }
    
            public function index(){
    
                $colaboradores = $this->colaboradorModelo->obtenerColab();
                $this->datos['colaborador'] = $colaboradores;

                $colabEncript = json_encode($colaboradores);

                $this->colabEncript['colaboradores'] = $colabEncript;
    
                $this->vista('colaboradores/inicio',$this->datos, $this->colabEncript);
    
            }

            public function borrarColab($id){

                $this->colaboradorModelo->borrarColab($id);
    
                redireccionar('/Colaboradores');
    
            }

            public function editarColab(){

                $colaboradorModificado = [
                    'idcolaborador' => trim($_POST['idcolaborador']),
                    'empresa' => trim($_POST['empresa']),
                    'telefono' => trim($_POST['telefono']),
                    'nif' => trim($_POST['nif']),
                    'direccion' => trim($_POST['direccion']),
                    'codigo_postal' => trim($_POST['codigo_postal']),
                ];

                // print_r($colaboradorModificado);exit();
    
                $this->colaboradorModelo->actualizarColab($colaboradorModificado);
                redireccionar('/Colaboradores');
    
            }

            public function anadirColab(){    
    
                $colaboradorNuevo = [
                    'empresa' => trim($_POST['empresa']),
                    'telefono' => trim($_POST['telefono']),
                    'nif' => trim($_POST['nif']),
                    'direccion' => trim($_POST['direccion']),
                    'codigo_postal' => trim($_POST['codigo_postal']),
                ];

                // print_r($colaboradorNuevo);exit();
    
                $this->colaboradorModelo->addColab($colaboradorNuevo);
                redireccionar('/Colaboradores');
    
            }
    }

?>