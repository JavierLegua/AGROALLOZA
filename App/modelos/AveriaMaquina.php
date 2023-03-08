<?php

    class AveriaMaquina{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerAverias($id){
            $this->db->query("SELECT * FROM averia_maquina WHERE maquina_idmaquina = :id");
            $this->db->bind(':id', $id);

            return $this->db->registros();
        }

        public function obtenerMaquinas(){
            $this->db->query("SELECT * FROM maquina");

            return $this->db->registros();
        }

        public function borrarAveria($id){
    
            $this->db->query("DELETE FROM averia_maquina WHERE idaveria_maquina = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function addAveria($datos){
            $this->db->query("INSERT INTO averia_maquina (descripcion, num_horas_averia, lugar_reparacion, precio_reparacion,fecha, maquina_idmaquina) VALUES (:descripcion, :num_horas_averia, :lugar_reparacion, :precio_reparacion,:fecha, :idmaquina )");

            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':num_horas_averia',$datos['num_horas_averia']);
            $this->db->bind(':lugar_reparacion',$datos['lugar_reparacion']);
            $this->db->bind(':precio_reparacion',$datos['precio_reparacion']);
            $this->db->bind(':fecha',$datos['fecha']);
            $this->db->bind(':idmaquina',$datos['idmaquina']);

            $this->db->execute();
        }
    }

?>