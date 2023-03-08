<?php

    class Tarea{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerTareas(){
            $this->db->query("SELECT * FROM tarea ORDER BY completado ASC"); 

            return $this->db->registros();
        }

        public function obtenerCampos(){
            $this->db->query("SELECT * FROM campo"); 

            return $this->db->registros();
        }

        public function obtenerEncargados(){
            $this->db->query("SELECT * FROM usuario"); 

            return $this->db->registros();
        }

        public function obtenerAperos(){
            $this->db->query("SELECT * FROM apero"); 

            return $this->db->registros();
        }

        public function obtenerMaquinas(){
            $this->db->query("SELECT * FROM maquina"); 

            return $this->db->registros();
        }

        public function borrarTarea($id){
    
            $this->db->query("DELETE FROM tarea WHERE idtarea = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function agregarTarea($datos){
            $this->db->query("INSERT INTO tarea (descripcion, observaciones, coste, num_horas, completado, encargado, campo_idcampo, maquina_idmaquina, apero_idapero) VALUES (:descripcion, :observaciones, :coste, :num_horas, :completado, :encargado, :campo_idcampo, :maquina_idmaquina, :apero_idapero)");

            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':observaciones',$datos['observaciones']);
            $this->db->bind(':coste',$datos['coste']);
            $this->db->bind(':num_horas',$datos['num_horas']);
            $this->db->bind(':completado',$datos['completado']);
            $this->db->bind(':encargado',$datos['encargado']);
            $this->db->bind(':campo_idcampo',$datos['campo']);
            $this->db->bind(':maquina_idmaquina',$datos['maquina']);
            $this->db->bind(':apero_idapero',$datos['apero']);

            $this->db->execute();

        }

        public function endTarea($datos){
            $this->db->query("UPDATE tarea SET observaciones=:observaciones, coste=:coste, num_horas=:num_horas, completado=:completado WHERE idtarea=:id");

            $this->db->bind(':id',$datos['idtarea']);
            $this->db->bind(':observaciones',$datos['observaciones']);
            $this->db->bind(':coste',$datos['coste']);
            $this->db->bind(':num_horas',$datos['num_horas']);
            $this->db->bind(':completado',$datos['completado']);

            $this->db->execute();
        }

        public function verTerminadas(){
            $this->db->query("SELECT * FROM tarea WHERE completado = 1"); 

            return $this->db->registros();
        }

    }

?>