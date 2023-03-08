<?php

    class MantenimientoApero{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMantenimientos($id){
            $this->db->query("SELECT * FROM mantenimiento_apero WHERE apero_idapero = :id");
            $this->db->bind(':id', $id);

            return $this->db->registros();
        }

        public function obtenerAperos(){
            $this->db->query("SELECT * FROM apero");

            return $this->db->registros();
        }

        public function borrarMantenimiento($id){
    
            $this->db->query("DELETE FROM mantenimiento_maquina WHERE idmantenimiento_maquina = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function addMantenimiento($datos){
            $this->db->query("INSERT INTO mantenimiento_apero (tipo, lugar, precio, observaciones,fecha, apero_idapero) VALUES (:tipo, :lugar, :precio, :observaciones,:fecha, :idapero )");

            $this->db->bind(':tipo',$datos['tipo']);
            $this->db->bind(':lugar',$datos['lugar']);
            $this->db->bind(':precio',$datos['precio']);
            $this->db->bind(':observaciones',$datos['observaciones']);
            $this->db->bind(':fecha',$datos['fecha']);
            $this->db->bind(':idapero',$datos['idapero']);

            $this->db->execute();
        }
    }

?>