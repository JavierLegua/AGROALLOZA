<?php

    class Usuario {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function contarUsuarios(){
            $this->db->query("SELECT * FROM usuario");

            return $this->db->rowCount();
        }

        public function contarUsuariosNoActivos(){
            $this->db->query("SELECT * FROM usuario WHERE validado = 1");

            return $this->db->rowCount();
        }

        public function obtenerUsuarios($min = -1, $registrosPorPagina = 0){

            if ($min == -1 && $registrosPorPagina == 0) {
                $this->db->query("SELECT usuario.*, rol.nombre as rol_nombre FROM `usuario` INNER JOIN rol ON usuario.rol_idrol=rol.idrol WHERE idusuario NOT IN(0) ORDER BY usuario.validado");
            }else{
                $this->db->query("SELECT usuario.*, rol.nombre as rol_nombre FROM `usuario` INNER JOIN rol ON usuario.rol_idrol=rol.idrol WHERE idusuario NOT IN(0) ORDER BY usuario.validado DESC LIMIT $min, $registrosPorPagina ");
            }

            return $this->db->registros();
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();
        }


        public function agregarUsuario($datos){
       
            // print_r($datos);exit();

            $this->db->query("INSERT INTO usuario (nombre ,DNI, fecha_nacimiento, email, direccion, salario, codigo_postal, clave, telefono, validado, rol_idrol) 
                                        VALUES (:nombre, :DNI, :fecha_nacimiento, :email, :direccion, :salario, :codigo_postal, :clave, :telefono, :validado, :rol_idrol)");

            //vinculamos los valores
            $this->db->bind(':nombre',$datos['nombreUsuario']);
            $this->db->bind(':DNI',$datos['dniUsuario']);
            $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':direccion',$datos['direccion']);
            $this->db->bind(':salario',$datos['salario']);
            $this->db->bind(':codigo_postal',$datos['codigo_postal']);
            $this->db->bind(':clave',$datos['clave']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':validado',$datos['validado']);
            $this->db->bind(':rol_idrol',$datos['rol_idrol']);

            $this->db->execute();

            //ejecutamos
            
        }

        public function obtenerUsuarioId($id){
            $this->db->query("SELECT * FROM usuario WHERE idusuario = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }


        public function actualizarUsuario($datos){
            // print_r($datos);exit;
            $this->db->query("UPDATE usuario SET nombre=:nombre, DNI=:DNI, fecha_nacimiento=:fecha_nacimiento, email=:email, telefono=:telefono, validado=:validado WHERE idusuario = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idusuario']);
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':DNI',$datos['DNI']);
            $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':validado',$datos['validado']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function actualizar($datos){
            //print_r($datos);exit;
            $this->db->query("UPDATE usuario SET clave=:clave WHERE idusuario = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idusuario']);
            $this->db->bind(':clave',$datos['clave']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function borrarUsuario($id){
            $this->db->query("DELETE FROM usuario WHERE idusuario = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function recuperarPass($email, $pass){
            $this->db->query("UPDATE usuario SET clave=:clave WHERE email = :email");

            $this->db->bind(':email', $email);
            $this->db->bind(':clave', $pass);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function agregarFoto($id, $fotoNueva){

            // print_r($id);exit();
            $this->db->query("UPDATE usuario SET foto = :foto WHERE idusuario = :id");

            $this->db->bind(':id', $id);
            $this->db->bind(':foto', $fotoNueva['imagen']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function verificarCorreo($email){
            //print_r($email);exit();
            $this->db->query("SELECT email FROM usuario WHERE email = :user_email");
            $this->db->bind(':user_email',$email);
            return $this->db->registros();
        }

///////////////////////////////////////////////// Sesion //////////////////////////////////////////////

        public function obtenerSesionesUsuario($id){
            $this->db->query("SELECT * FROM sesiones 
                                        WHERE idusuario = :id
                                        ORDER BY fecha_inicio");
            $this->db->bind(':id',$id);

            return $this->db->registros();
        }


        public function cerrarSesion($id_sesion){
            $this->db->query("UPDATE sesiones SET fecha_fin = NOW()  
                                    WHERE id_sesion = :id_sesion");

            $this->db->bind(':id_sesion',$id_sesion);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>