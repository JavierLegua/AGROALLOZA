<?php 

    class Tareas extends Controlador{
        public function __construct(){

            Sesion::iniciarSesion($this->datos);
    
            $this->datos['rolesPermitidos'] = [1,2,3];          // Definimos los roles que tendran acceso
    
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }
    
            $this->tareaModelo = $this->modelo('Tarea');
    
            $this->datos['menuActivo'] = 2; 

        }

        public function index(){
            
            $tareas = $this->tareaModelo->obtenerTareas();
            $encargados = $this->tareaModelo->obtenerEncargados();
            $campos = $this->tareaModelo->obtenerCampos();
            $aperos = $this->tareaModelo->obtenerAperos();
            $maquinas = $this->tareaModelo->obtenerMaquinas();
            $tareasSinTerminar = $this->tareaModelo->obtenerTareasSinTerminar();

            $this->datos['tarea'] = $tareas;
            $this->datos['usuario'] = $encargados;
            $this->datos['campo'] = $campos;
            $this->datos['apero'] = $aperos;
            $this->datos['maquina'] = $maquinas;
            $this->datos['tareasSinTerminar'] = $tareasSinTerminar;

            $tareasEncript = json_encode($tareas);

            $this->datos['tareaEncript'] = $tareasEncript;

            $this->vista('tareas/inicio', $this->datos);
        }

        public function borrarTarea($id){

            $this->tareaModelo->borrarTarea($id);

            redireccionar('/Tareas');

        }

        public function crearTarea(){

            $tareaNueva = [
                'descripcion' => trim($_POST['descripcion']),
                'observaciones' => "-",
                'coste' => 0,
                'num_horas' => 0,
                'completado' => 0,
                'encargado' => trim($_POST['encargado']),
                'campo' => trim($_POST['campo']),
                'maquina' => trim($_POST['maquina']),
                'apero' => trim($_POST['apero']),
            ];
            // print_r($tareaNueva);exit();

            $this->tareaModelo->agregarTarea($tareaNueva);
                redireccionar('/Tareas');
        }

        public function completarTarea($id){

            $tareaCompletada = [
                'idtarea' => $id,
                'observaciones' => trim($_POST['observaciones']),
                'coste' => trim($_POST['coste']),
                'num_horas' => trim($_POST['num_horas']),
                'completado' => 1,
            ];

            $this->tareaModelo->endTarea($tareaCompletada);
            redireccionar('/Tareas');
        }

        public function verCompletadas(){

            $this->tareaModelo->verTerminadas();

            redireccionar('/Tareas');
        }
    }

?>