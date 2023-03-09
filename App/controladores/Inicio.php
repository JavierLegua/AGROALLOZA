<?php

    class Inicio extends Controlador{

        public function __construct(){

            $this->loginModelo = $this->modelo('LoginModelo');
            $this->usuarioModelo = $this->modelo('Usuario');

        }

        public function index ($error = ''){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->datos['email'] = trim($_POST['email']);
                $this->datos['clave'] = trim($_POST['clave']);

                $usuarioSesion = $this->loginModelo->loginEmail($this->datos['email']);
                //print_r($usuarioSesion);exit();

                if(isset($usuarioSesion)) {

                    if (empty($usuarioSesion)) {
                        //echo("hola");exit();
                        $this->vista('/errores/error');
                    } else {
                        //print_r($this->datos);
                        $accesoPermitido = password_verify($this->datos['clave'], $usuarioSesion->clave);
                        //print_r($accesoPermitido);exit();
                    //comprobamos que la contraseña introducida concuerde con el hash guardado de la bbdd
                    // print_r($this->datos['clave']); echo "<br>";
                    // print_r($usuarioSesion->clave);
                    // exit();
                        if($accesoPermitido && $usuarioSesion->validado == '0'){
                            Sesion::crearSesion($usuarioSesion);
                            //echo("hola15");
                            $this->loginModelo->registroSesion($usuarioSesion->idusuario); // registro el login en DDBB
                            redireccionar('/'); 
                        } else {
                            //print_r($accesoPermitido); print_r($usuarioSesion->clave);exit();
                            $this->vista('/errores/error');
                        }
                    }
                } else {
                    redireccionar('/login/index/error_1');
                }
            }else{
                if (Sesion::sesionCreada($this->datos)){     // dependiendo del rol que tiene el usuario el cual ha iniciado sesion se le redirige a una pagina u otra
                    if ($this->datos['usuarioSesion']->rol_idrol == 1) {
                            redireccionar('/admin');
                    } elseif ($this->datos['usuarioSesion']->rol_idrol == 2){
                        redireccionar('/encargado');
                    } elseif ($this->datos['usuarioSesion']->rol_idrol == 3){
                        redireccionar('/peon');
                    }    
                } else{
                    $this->datos['error'] = $error;
                    $this->vista('login', $this->datos);
                }
            }

            
               
        }

        public function recuperarPass1(){

            // print_r($_POST['emailRec']);exit();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                //funcion para generar contraseña aleatoria
                 
                $cadena = "abcdefghijklmnopqrstxwyz0123456789";
                $longitudCadena=strlen($cadena);    
                $pass = "";
                $longitudPass=6;    

                    for($i=1 ; $i<=$longitudPass ; $i++){
                        $pos=rand(0,$longitudCadena-1);     
                        $pass .= substr($cadena,$pos,1);
                    }

                $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

                $to = $_POST['emailRec'];
                //$email = "javierlegua14@gmail.com";
                //$to = "javierlegua14@gmail.com";
                $nombreTo = "Socio";
                $asunto = "Recuperación contraseña";
                $cuerpo = "Su contraseña temporal es: $pass";
                // echo "hola";exit();
                $respuesta = EnviarEmail::sendEmail($to,$nombreTo,$asunto,$cuerpo);

                if ($respuesta == '1') {
                    $this->usuarioModelo->recuperarPass($to, $passCifrada);
                    redireccionar("/");
                }else{
                    echo "No se ha podido enviar el mensaje. Error: $respuesta";
                }
                

                
                
                
            }else{
                 redireccionar('/');
            }
        }

        public function agregar(){
            //prueba de cifrado de contraseña

            $pass = $_POST['clave'];

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $usuarioNuevo = [
                    'nombreUsuario' => trim($_POST['nombre']),
                    'dniUsuario' => trim($_POST['dni']),
                    'fecha_nacimiento' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'direccion' => trim($_POST['direccion']),
                    'salario' => 0,
                    'codigo_postal' => trim($_POST['cp']),
                    'clave' => trim($passCifrada),
                    'telefono' => trim($_POST['telefono']),
                    'validado' => 1,
                    'rol_idrol' => 3,
                ];

                // print_r($usuarioNuevo);exit();

                $this->loginModelo->agregarUsuario($usuarioNuevo);
                redireccionar('/');
            }
        }

    }
?>

