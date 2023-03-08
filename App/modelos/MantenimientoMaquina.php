<?php

    class MantenimientoMaquina{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMaquinas(){
            $this->db->query("SELECT * FROM maquina");

            return $this->db->registros();
        }

        public function obtenerMantenimientos($id){
            $this->db->query("SELECT * FROM mantenimiento_maquina WHERE maquina_idmaquina = :id");
            $this->db->bind(':id', $id);

            return $this->db->registros();
        }

        public function borrarMantenimiento($id){
    
            $this->db->query("DELETE FROM mantenimiento_maquina WHERE idmantenimiento_maquina = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function addMantenimiento($datos){
            $this->db->query("INSERT INTO mantenimiento_maquina (tipo, num_horas, lugar, num_horas_prox_mantenimiento, observaciones,fecha, maquina_idmaquina) VALUES (:tipo, :num_horas, :lugar, :num_horasproxmant, :observaciones,:fecha, :idmaquina )");

            $this->db->bind(':tipo',$datos['tipo']);
            $this->db->bind(':num_horas',$datos['num_horas']);
            $this->db->bind(':lugar',$datos['lugar']);
            $this->db->bind(':num_horasproxmant',$datos['num_horasproxmant']);
            $this->db->bind(':observaciones',$datos['observaciones']);
            $this->db->bind(':fecha',$datos['fecha']);
            $this->db->bind(':idmaquina',$datos['idmaquina']);

            $this->db->execute();
        }
    }

?>