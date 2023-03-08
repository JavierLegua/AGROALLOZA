<?php

    class Perfil{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerPerfil($id){
            // print_r("hola");exit();
            $this->db->query("SELECT * FROM usuario WHERE idusuario = :id");
            $this->db->bind(':id',$id);


            return $this->db->registros();
        }

        public function cambiarClave($datos){
                $this->db->query("UPDATE usuario SET clave=:clave WHERE idusuario = :id");
    
                //vinculamos los valores
                $this->db->bind(':id',$datos['id_usuario']);
                $this->db->bind(':clave',$datos['clave']);
    
                //ejecutamos
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
        }

    }

?>