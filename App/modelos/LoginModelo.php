<?php

    class LoginModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function obtenerPass($clave){
            $this->db->query("SELECT clave FROM usuario");
            $this->db->bind(':clave',$clave);

            return $this->db->registro();
        }

        public function loginEmail($email){
            $this->db->query("SELECT * FROM usuario WHERE email = :email");
            $this->db->bind(':email',$email);

            return $this->db->registro();
        }


        public function registroSesion($id_usuario){
            $this->db->query("INSERT INTO sesiones (id_sesion, id_usuario, fecha_inicio) 
                                        VALUES (:id_sesion, :id_usuario, NOW())");

            $this->db->bind(':id_sesion',session_id());
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function registroFinSesion($id_usuario){
            $this->db->query("UPDATE sesiones SET fecha_fin = NOW()  
                                    WHERE id_usuario = :id_usuario AND id_sesion = :id_sesion");

            $this->db->bind(':id_sesion',session_id());
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function agregarUsuario($datos){
       

            $this->db->query("INSERT INTO usuario (nombre ,DNI, fecha_nacimiento, email, direccion, codigo_postal, clave, telefono, validado, rol_idrol) 
            VALUES (:nombre, :DNI, :fecha_nacimiento, :email, :direccion, :codigo_postal, :clave, :telefono, :validado, :rol_idrol)");

            //vinculamos los valores
            $this->db->bind(':nombre',$datos['nombreUsuario']);
            $this->db->bind(':DNI',$datos['dniUsuario']);
            $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':direccion',$datos['direccion']);
            $this->db->bind(':codigo_postal',$datos['codigo_postal']);
            $this->db->bind(':clave',$datos['clave']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':validado',$datos['validado']);
            $this->db->bind(':rol_idrol',$datos['rol_idrol']);

            $this->db->execute();

            //ejecutamos
            
        }
    }
