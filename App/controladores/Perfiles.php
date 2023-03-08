<?php

class Perfiles extends Controlador{

public function __construct(){

    Sesion::iniciarSesion($this->datos);
    $this->datos['rolesPermitidos'] = [1,2,3];          // Definimos los roles que tendran acceso


    if (!tienePrivilegios($this->datos['usuarioSesion']->rol_idrol,$this->datos['rolesPermitidos'])) {
        redireccionar('/');
    }

    $this->perfilModelo = $this->modelo('Perfil');

    $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
    
}


public function index(){
    //Obtenemos los usuarios
    $perfil = $this->perfilModelo->obtenerPerfil($this->datos['usuarioSesion']->idusuario);

    $this->datos['perfil'] = $perfil;

    $this->vista('perfiles/inicio',$this->datos);
}

public function cambiarClave($id){

    $this->datos['rolesPermitidos'] = [1,2,3];
    
    $pass = $_POST['clave'];
    //$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

    $passCifrada = password_hash($pass, PASSWORD_BCRYPT);// Definimos los roles que tendran acceso
    
    if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
        redireccionar('/usuarios');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $passModificada = [
            'id_usuario' => $id,
            'clave' => trim($passCifrada),
        ];

        

        if ($this->perfilModelo->cambiarClave($passModificada)){
            redireccionar('/perfiles');
        } else {
            die('Algo ha fallado!!!');
        }
    } else {
        
        $this->vista('socios/inicio',$this->datos);
       
    }
}

}
?>
