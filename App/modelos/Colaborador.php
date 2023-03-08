<?php

    class Colaborador{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerColab(){
            $this->db->query("SELECT * FROM colaborador");

            return $this->db->registros();
        }

        public function borrarColab($id){
            $this->db->query("DELETE FROM colaborador WHERE idcolaborador = :id");
            $this->db->bind(':id',$id);

            $this->db->execute();
        }

        public function actualizarColab($datos){

            // print_r($datos);exit();

            $this->db->query("UPDATE colaborador SET empresa=:empresa, telefono=:telefono, NIF=:nif, direccion=:direccion, codigo_postal=:codigo_postal WHERE idcolaborador = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idcolaborador']);
            $this->db->bind(':empresa',$datos['empresa']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':nif',$datos['nif']);
            $this->db->bind(':direccion',$datos['direccion']);
            $this->db->bind(':codigo_postal',$datos['codigo_postal']);

            $this->db->execute();

        }

        public function addColab($datos){

            // print_r($datos);exit();

            $this->db->query("INSERT INTO colaborador (empresa, telefono, NIF, direccion, codigo_postal) VALUES (:empresa, :telefono, :nif, :direccion, :codigo_postal)");
 
            $this->db->bind(':empresa',$datos['empresa']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':nif',$datos['nif']);
            $this->db->bind(':direccion',$datos['direccion']);
            $this->db->bind(':codigo_postal',$datos['codigo_postal']);
 
            $this->db->execute();
 
        }
    }

?>