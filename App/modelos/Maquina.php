<?php

    class Maquina{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMaquinas(){
            $this->db->query("SELECT * FROM maquina");

            return $this->db->registros();
        }

        public function borrarMaquina($id){
            $this->db->query("DELETE FROM maquina WHERE idmaquina = :id");
            $this->db->bind(':id',$id);

            $this->db->execute();
        }

        public function actualizarMaquina($datos){

            $this->db->query("UPDATE maquina SET modelo=:modelo, matricula=:matricula, num_horas=:horas WHERE idmaquina = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idmaquina']);
            $this->db->bind(':modelo',$datos['modelo']);
            $this->db->bind(':matricula',$datos['matricula']);
            $this->db->bind(':horas',$datos['horas']);

            $this->db->execute();

        }

        public function addMaquina($datos){

            //  print_r($datos);exit();

            $this->db->query("INSERT INTO maquina (modelo, matricula, num_horas) VALUES (:modelo, :matricula, :horas)");

            $this->db->bind(':modelo',$datos['modelo']);
            // $this->db->bind(':foto', $datos['imagen']);
            $this->db->bind(':matricula',$datos['matricula']);
            $this->db->bind(':horas',$datos['horas']);

            $this->db->execute();

        }

        public function agregarFoto($id, $fotoNueva){

            // print_r($id);exit();
            $this->db->query("UPDATE usuario SET foto = :foto WHERE id_usuario = :id");

            $this->db->bind(':id', $id);
            $this->db->bind(':foto', $fotoNueva['imagen']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
    }

?>