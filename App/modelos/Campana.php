<?php

    class Campana{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCampanas(){
            $this->db->query("SELECT * FROM campaña");

            return $this->db->registros();
        }

        public function obtenerEncargados(){
            $this->db->query("SELECT * FROM usuario");

            return $this->db->registros();
        }

        public function borrarCampana($id){

            $this->db->query("DELETE FROM campaña WHERE idcampaña = :id");
            $this->db->bind(':id',$id);

            $this->db->execute();
        }

        public function actualizarCampana($datos){

            $this->db->query("UPDATE campaña SET nombre=:nombre, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, tipo_cultivo=:tipo_cultivo, kilos_recolectados=:kilos_recolectados, encargado_idencargado=:encargado_idencargado WHERE idcampaña = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idcampana']);
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':fecha_inicio',$datos['fecha_inicio']);
            $this->db->bind(':fecha_fin',$datos['fecha_fin']);
            $this->db->bind(':tipo_cultivo',$datos['tipo_cultivo']);
            $this->db->bind(':kilos_recolectados',$datos['kilos_recolectados']);
            $this->db->bind(':encargado_idencargado',$datos['encargado_idencargado']);

            $this->db->execute();

        }

        public function addCampana($datos){

            $this->db->query("INSERT INTO campaña (nombre, fecha_inicio, fecha_fin, tipo_cultivo, kilos_recolectados, encargado_idencargado) VALUES (:nombre, :fecha_inicio, NULL, :tipo_cultivo, NULL, :encargado_idencargado)");
 
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':fecha_inicio',$datos['fecha_inicio']);
            // $this->db->bind(':fecha_fin',$datos['fecha_fin']);
            $this->db->bind(':tipo_cultivo',$datos['tipo_cultivo']);
            // $this->db->bind(':kilos_recolectados',$datos['kilos_recolectados']);
            $this->db->bind(':encargado_idencargado',$datos['encargado_idencargado']);
 
            $this->db->execute();
 
        }
    }

?>