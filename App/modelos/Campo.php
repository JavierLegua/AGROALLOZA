<?php

    class Campo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCampos($min = -1, $registrosPorPagina = 0){
            
            if ($min == -1 && $registrosPorPagina == 0){
                $this->db->query("SELECT * FROM campo");
            }else{
                $this->db->query("SELECT * FROM campo LIMIT $min, $registrosPorPagina");
            }

            return $this->db->registros();
        }

        public function contarCampos(){
            $this->db->query("SELECT * FROM campo");

            return $this->db->rowCount();
        }

        public function borrarCampo($id){
            $this->db->query("DELETE FROM campo WHERE idcampo = :id");
            $this->db->bind(':id',$id);

            $this->db->execute();
        }

        public function actualizarCampo($datos){

            $this->db->query("UPDATE campo SET nombre=:nombre, partida=:partida, estado_tierra=:estado_tierra, estado_arboles=:estado_arboles, tipo_plantacion=:tipo_plantacion WHERE idcampo = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idcampo']);
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':partida',$datos['partida']);
            $this->db->bind(':estado_tierra',$datos['estado_tierra']);
            $this->db->bind(':estado_arboles',$datos['estado_arboles']);
            $this->db->bind(':tipo_plantacion',$datos['tipo_plantacion']);

            $this->db->execute();

        }

        public function addCampo($datos){

           $this->db->query("INSERT INTO campo (nombre, partida, estado_tierra, estado_arboles, tipo_plantacion) VALUES (:nombre, :partida, :estado_tierra, :estado_arboles, :tipo_plantacion)");

           $this->db->bind(':nombre',$datos['nombre']);
           $this->db->bind(':partida', $datos['partida']);
           $this->db->bind(':estado_tierra',$datos['estado_tierra']);
           $this->db->bind(':estado_arboles',$datos['estado_arboles']);
           $this->db->bind(':tipo_plantacion',$datos['tipo_plantacion']);

           $this->db->execute();

       }
    }

?>