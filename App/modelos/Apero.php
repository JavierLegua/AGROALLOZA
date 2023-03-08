<?php

    class Apero{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerAperos(){
            $this->db->query("SELECT * from apero");

            return $this->db->registros();
        }

        public function borrarApero($id){
    
            $this->db->query("DELETE FROM apero WHERE idapero = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function actualizarApero($datos){

            $this->db->query("UPDATE apero SET modelo=:modelo, matricula=:matricula WHERE idapero = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idapero']);
            $this->db->bind(':modelo',$datos['modelo']);
            $this->db->bind(':matricula',$datos['matricula']);
            // $this->db->bind(':foto',$datos['foto']);

            $this->db->execute();

        }

        public function addApero($datos){
            $this->db->query("INSERT INTO apero (modelo, matricula) VALUES (:modelo, :matricula)");

            $this->db->bind(':modelo',$datos['modelo']);
            $this->db->bind(':matricula',$datos['matricula']);
            // $this->db->bind(':foto',$datos['foto']);

            $this->db->execute();

        }


    }

?>