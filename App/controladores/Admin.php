<?php

    class Admin extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->usuarioModelo = $this->modelo('Usuario');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //Obtenemos los usuarios
            $usuarios = $this->usuarioModelo->obtenerUsuarios();
            $usuariosNoActivos = $this->usuarioModelo->contarUsuariosNoActivos();

            $this->datos['usuario'] = $usuarios;
            $this->datos['usuarioNoActivo'] = $usuariosNoActivos;

            $this->vista('admins/inicio',$this->datos);
            // $this->vista('usuarios/inicioVue',$this->datos);
        }

        public function mantenimiento(){
            $this->vista('errores/mantenimiento');
        }

        public function agregar(){
            
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $usuarioNuevo = [
                    'apellidoUsuario' => trim($_POST['nombre']),
                    'dniUsuario' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'clave' => trim($_POST['clave']),
                    'telefono' => trim($_POST['telefono']),
                    'activado' => trim($_POST['activado']),
                    'rol_idrol' => trim($_POST['rol']),
                ];

                if ($this->usuarioModelo->agregarUsuario($usuarioNuevo)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['usuario'] = (object) [
                    'apellidoUsuario' => '',
                    'dniUsuario' => '',
                    'cc' => '',
                    'fecha_nac' => '',
                    'email' => '',
                    'clave' => '',
                    'telefono' => '',
                    'activado' => '',
                    'rol_idrol' => 3
                ];

                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();

                $this->vista('usuarios/agregar_editar',$this->datos);
            }
        }


        public function editar($id){
            
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $usuarioModificado = [
                    'id_usuario' => $id,
                    'apellidoUsuario' => trim($_POST['nombre']),
                    'dniUsuario' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'clave' => trim($_POST['clave']),
                    'telefono' => trim($_POST['telefono']),
                    'activado' => trim($_POST['activado']),
                    'rol_idrol' => trim($_POST['rol']),
                ];

                

                if ($this->usuarioModelo->actualizarUsuario($usuarioModificado)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);
                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();
                $this->vista('usuarios/agregar_editar',$this->datos);
               
            }
        }


        public function borrar($id){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->usuarioModelo->borrarUsuario($id)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                //obtenemos información del usuario desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);

                $this->vista('usuarios/borrar',$this->datos);
            }
        }

        
        public function sesiones($id_usuario){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                exit();
            }

            // En __construct() verificamos que se haya iniciado la sesion
            $sesiones = $this->usuarioModelo->obtenerSesionesUsuario($id_usuario);
            $usuario = $this->usuarioModelo->obtenerUsuarioId($id_usuario);

            // utilizamos $datos en lugar de $this->datos ya que no necesitamos los datos del usuario de sesion
            $datos['sesiones'] = $sesiones;
            $datos['usuario'] = $usuario;

            $this->vistaApi($datos);
        }


        public function cerrarSesion(){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                exit();
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_sesion = $_POST['id_sesion'];
                
                $resultado = $this->usuarioModelo->cerrarSesion($id_sesion);

                unlink(session_save_path().'\\sess_'.$id_sesion);
                $this->vistaApi($resultado);
            }
        }
    }
