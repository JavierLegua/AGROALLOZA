<?php

    Class Campanas extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);
    
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso
    
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }
    
            $this->campanaModelo = $this->modelo('Campana');
    
            $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista
    
            }
    
            public function index(){
    
                $campanas = $this->campanaModelo->obtenerCampanas();
                $this->datos['campana'] = $campanas;

                $encargados = $this->campanaModelo->obtenerEncargados();
                $this->datos['encargado'] = $encargados;
    
                $this->vista('campanas/inicio',$this->datos);
    
            }

            public function borrarCampana($id){

                $this->campanaModelo->borrarCampana($id);
    
                redireccionar('/Campanas');
    
            }

            public function editarCampana(){

                $campanaModificada = [
                    'idcampana' => trim($_POST['idcampana']),
                    'nombre' => trim($_POST['nombre']),
                    'fecha_inicio' => trim($_POST['fecha_inicio']),
                    'fecha_fin' => trim($_POST['fecha_fin']),
                    'tipo_cultivo' => trim($_POST['tipo_cultivo']),
                    'kilos_recolectados' => trim($_POST['kilos_recolectados']),
                    'encargado_idencargado' => trim($_POST['encargado_idencargado']),
                ];
    
                $this->campanaModelo->actualizarCampana($campanaModificada);
                redireccionar('/Campanas');
    
            }

            public function anadirCampana(){    
    
                $campanaNueva = [
                    'nombre' => trim($_POST['nombre']),
                    'fecha_inicio' => trim($_POST['fecha_inicio']),
                    // 'fecha_fin' => trim($_POST['fecha_fin']),
                    'tipo_cultivo' => trim($_POST['tipo_cultivo']),
                    // 'kilos_recolectados' => trim($_POST['kilos_recolectados']),
                    'encargado_idencargado' => trim($_POST['encargado_idencargado']),
                ];

                // print_r($campanaNueva);exit();
    
                $this->campanaModelo->addCampana($campanaNueva);
                redireccionar('/Campanas');
    
            }
    }

?>