<?php

    class Usuarios extends Controlador{


        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1,3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->usuarioModelo = $this->modelo('Usuario');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function obtenerrol(){
            $roles = $this->usuarioModelo->obtenerRoles();
            $this->vistaApi($roles);
        }

        public function index($pagina = 0){
            //Obtenemos los usuarios y paginamos


            $registrosPorPagina = 2;
            $pagina = intval($pagina + 1);
            $numUsuarios = $this->usuarioModelo->contarUsuarios();


            $numPagTotal = ceil($numUsuarios / $registrosPorPagina);

            $min = ($registrosPorPagina * $pagina) - ($registrosPorPagina);
            

            $usuarios = $this->usuarioModelo->obtenerUsuarios($min, $registrosPorPagina);
            $usuarios1 = $this->usuarioModelo->obtenerUsuarios(-1, 0);
            $roles = $this->usuarioModelo->obtenerRoles();

            // print_r($usuarios1);exit();

            $usuariosEncript = json_encode($usuarios1);

            $this->datos['usuario'] = $usuarios;
            $this->usuEncript['usuarios'] = $usuariosEncript;
            $this->numPaginas = $numPagTotal;
            $this->rol = $roles;
            // print_r($this->rol);exit();
            $this->vista('usuarios/inicio',$this->datos, $this->usuEncript, $this->numPaginas, $this->rol);
        }


        public function agregar(){
            $this->datos['rolesPermitidos'] = [1];      // Definimos los roles que tendran acceso

            //prueba de cifrado de contraseña

            $pass = $_POST['clave'];

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);
                
                $usuarioNuevo = [
                    'nombreUsuario' => trim($_POST['nombre']),
                    'dniUsuario' => trim($_POST['dni']),
                    'fecha_nacimiento' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'direccion' => trim($_POST['direccion']),
                    'salario' => trim($_POST['salario']),
                    'codigo_postal' => trim($_POST['cp']),
                    'clave' => trim($passCifrada),
                    'telefono' => trim($_POST['telefono']),
                    'validado' => 0,
                    'rol_idrol' => trim($_POST['rol']),
                ];


                $this->usuarioModelo->agregarUsuario($usuarioNuevo);
                redireccionar("/usuarios");
        }


        public function editar($id){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }

            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $usuarioModificado = [
                    'idusuario' => $id,
                    'nombre' => trim($_POST['nombre']),
                    'DNI' => trim($_POST['dni']),
                    'fecha_nacimiento' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'telefono' => trim($_POST['telefono']),
                    'validado' => trim($_POST['validado']),
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

        public function actualizar($id){

            $this->datos['rolesPermitidos'] = [1,3];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }

            $pass = $_POST['clave'];
            //$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $passModificada = [
                    'clave' => trim($passCifrada),
                    'idusuario' => $id
                ];

                // print_r($passModificada);exit();

                

                if ($this->usuarioModelo->actualizar($passModificada)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);
                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();
                $this->vista('usuarios/actualizar',$this->datos);
               
            }
        }

        public function actualizarPerfil($id){

            $this->datos['rolesPermitidos'] = [1,2,3];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
            }

            $pass = $_POST['clave'];
            //$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $passModificada = [
                    'clave' => trim($passCifrada),
                    'idusuario' => $id
                ];

                // print_r($passModificada);exit();

                

                if ($this->usuarioModelo->actualizar($passModificada)){
                    redireccionar('/perfiles');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);
                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();
                $this->vista('usuarios/actualizar',$this->datos);
               
            }
        }

        public function subirFoto($id){

            if($_SERVER['REQUEST_METHOD'] =='POST'){
    
                $dir="/Users/javierlegua/sites/AGROALLOZA/public/img/datosBBDD/";
                
                // print_r($_FILES['imagen']['name']);exit();
    
                move_uploaded_file($_FILES['imagen']['tmp_name'], $dir.$_FILES['imagen']['name']);

                $id = $this->datos['usuarioSesion']->idusuario;
    
                $fotoNueva = [
                    'imagen' => $_FILES['imagen']['name']
                ];

                // print_r($fotoNueva); exit();
                if($this->usuarioModelo->agregarFoto($id, $fotoNueva)){
                    // print_r($licenciaNueva);exit();
                    redireccionar('/perfiles');
                }else{
                    die('Algo ha fallado!!');
                }
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

        
        public function sesiones($idusuario){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
                exit();
            }

            // En __construct() verificamos que se haya iniciado la sesion
            $sesiones = $this->usuarioModelo->obtenerSesionesUsuario($idusuario);
            $usuario = $this->usuarioModelo->obtenerUsuarioId($idusuario);

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
