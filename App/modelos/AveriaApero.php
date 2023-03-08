<?php

    class AveriaApero{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerAverias($id){
            $this->db->query("SELECT * FROM averia_apero WHERE apero_idapero = :id");
            $this->db->bind(':id', $id);

            return $this->db->registros();
        }

        public function obtenerAperos(){
            $this->db->query("SELECT * FROM apero");

            return $this->db->registros();
        }

        public function borrarAveria($id){
    
            $this->db->query("DELETE FROM averia_apero WHERE idaveria_apero = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function addAveria($datos){
            $this->db->query("INSERT INTO averia_apero (descripcion, lugar_reparacion, precio_reparacion,fecha, apero_idapero) VALUES (:descripcion, :lugar_reparacion, :precio_reparacion,:fecha, :idapero )");

            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':lugar_reparacion',$datos['lugar_reparacion']);
            $this->db->bind(':precio_reparacion',$datos['precio_reparacion']);
            $this->db->bind(':fecha',$datos['fecha']);
            $this->db->bind(':idapero',$datos['idapero']);

            $this->db->execute();
        }
    }

?>