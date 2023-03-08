<?php

    Class Cosechas extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);
    
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso
    
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }
    
            $this->cosechaModelo = $this->modelo('Cosecha');
    
            $this->datos['menuActivo'] = 2;         // Definimos el menu que sera destacado en la vista
    
            }
    
            public function index(){
    
                $cosechas = $this->cosechaModelo->obtenerCosechas();
                $campañas = $this->cosechaModelo->obtenerCampanas();
                $campos = $this->cosechaModelo->obtenerCampos();
                $colaboradores = $this->cosechaModelo->obtenerColaboradores();

                $this->datos['cosecha'] = $cosechas;
                $this->datos['campana'] = $campañas;
                $this->datos['campo'] = $campos;
                $this->datos['colaborador'] = $colaboradores;

    
                $this->vista('cosechas/inicio',$this->datos);
    
            }

            public function borrarCosecha($id){

                $this->cosechaModelo->borrarCosecha($id);
    
                redireccionar('/Cosechas');
    
            }

            public function editarCosecha(){

                // print_r($_POST);exit();

                $cosechaModificada = [
                    'idcosecha' => trim($_POST['idcosecha']),
                    'num_kilos' => trim($_POST['kilos']),
                    'campana' => trim($_POST['campana']),
                    'campo' => trim($_POST['campo']),
                    'colaborador' => trim($_POST['colaborador']),
                ];
    
                $this->cosechaModelo->actualizarCosecha($cosechaModificada);
                redireccionar('/Cosechas');
    
            }

            public function anadirCosecha(){
                
                $cosechaNueva = [
                    'num_kilos' => trim($_POST['kilos']),
                    'campana' => trim($_POST['campana']),
                    'campo' => trim($_POST['campo']),
                    'colaborador' => trim($_POST['colaborador']),
                ];

                $this->cosechaModelo->addCosecha($cosechaNueva);
                redireccionar('/Cosechas');
            }

            public function filtroCampana(){

                // print_r($_POST);exit();

                $idcampaña = $_POST['campana'];

                $cosechas = $this->cosechaModelo->obtenerCosechasFiltro($idcampaña);

                $campañas = $this->cosechaModelo->obtenerCampanas();
                $campos = $this->cosechaModelo->obtenerCampos();
                $colaboradores = $this->cosechaModelo->obtenerColaboradores();

                $this->datos['cosecha'] = $cosechas;
                $this->datos['campana'] = $campañas;
                $this->datos['campo'] = $campos;
                $this->datos['colaborador'] = $colaboradores;
                $this->datos['campanaActual'] = $idcampaña;
    
                $this->vista('cosechas/inicio',$this->datos);
            }
    }

?>