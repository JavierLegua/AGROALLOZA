<?php


    class Balances extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            $this->datos['rolesPermitidos'] = [1,3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->balanceModelo = $this->modelo('Balance');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
        //echo "hola que tal";

        }

        public function index(){

            $this->datos["ingreso"] = $this->balanceModelo->obtenerIngresos();
            $this->datos["gasto"] = $this->balanceModelo->obtenerGastos();
            $this->datos["tipo"] = $this->balanceModelo->obtenerTipos();
            $this->vista('balances/inicio',$this->datos);

        }

        public function borrarIngreso(){
            
            $id = $_POST['id'];
            // echo $id;exit();
            if ($this->balanceModelo->borrarIngreso($id)){
                redireccionar('/balances');
            } else {
                $this->vistaApi(false);
            }
        }

        public function borrarGasto(){
            
            $id = $_POST['id'];
            // echo $id;exit();
            if ($this->balanceModelo->borrarGasto($id)){
                redireccionar('/balances');
            } else {
                $this->vistaApi(false);
            }
        }

        public function agregarIngreso(){
            $datos = $_POST;

            // print_r($datos);exit();

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $ingresoNuevo = [

                    'concepto' => trim($_POST['concepto']),
                    'fecha' => trim($_POST['fecha']),
                    'cantidad' => trim($_POST['cantidad']),
                    'banco' => trim($_POST['banco']),
                    'tipo' => trim($_POST['tipo']),

                ];  

                if ($this->balanceModelo->agregarIngreso($ingresoNuevo)){
                    redireccionar('/balances');
                } else {
                    die('Algo ha fallado!!!');
                } 
            } else {
                    $this->datos['ingreso'] = (object) [
                        'concepto' => '',
                        'fecha' => '',
                        'banco' => '',
                        'cantidad' => '',
                        'tipo' => '',
                    ];
    
                    $this->datos['rol'] = $this->balanceModelo->obtenerRoles();
    
                    $this->vista('balances/inicio',$this->datos);
                }

            }

            public function agregarGasto(){
                $datos = $_POST;
    
                //  print_r($datos);exit();
    
                if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                    redireccionar('/');
                }
    
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
                    $gastoNuevo = [
    
                        'concepto' => trim($_POST['concepto']),
                        'cuenta_destino' => trim($_POST['cuenta_destino']),
                        'fecha' => trim($_POST['fecha']),
                        'cantidad' => trim($_POST['cantidad']),
                        'banco' => trim($_POST['banco']),
                        'tipo' => trim($_POST['tipo']),
    
                    ];  
    
                    if ($this->balanceModelo->agregarGasto($gastoNuevo)){
                        redireccionar('/balances');
                    } else {
                        die('Algo ha fallado!!!');
                    } 
                } else {
                        $this->datos['ingreso'] = (object) [
                            'concepto' => '',
                            'cuenta_destino' => '',
                            'fecha' => '',
                            'banco' => '',
                            'cantidad' => '',
                            'tipo' => '',
                        ];
        
                        $this->datos['rol'] = $this->balanceModelo->obtenerRoles();
        
                        $this->vista('balances/inicio',$this->datos);
                    }
    
            }

            public function exportCSV(){
                $this->balanceModelo->exportCSV();
            }
        }

        

    


?>