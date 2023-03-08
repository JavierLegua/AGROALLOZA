<?php

    class Cosecha{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCosechas(){
            $this->db->query("SELECT * FROM cosecha");
    
            return $this->db->registros();
        }

        public function obtenerCosechasFiltro($idcampaña){
            $this->db->query("SELECT * FROM cosecha WHERE campaña_idcampaña like $idcampaña");
    
            return $this->db->registros();
        }

        public function obtenerCampanas(){
            $this->db->query("SELECT * FROM campaña");
    
            return $this->db->registros();
        }

        public function obtenerCampos(){
            $this->db->query("SELECT * FROM campo");
    
            return $this->db->registros();
        }

        public function obtenerColaboradores(){
            $this->db->query("SELECT * FROM colaborador");
    
            return $this->db->registros();
        }
    
        public function borrarCosecha($id){
    
            $this->db->query("DELETE FROM cosecha WHERE idcosecha = :id");
            $this->db->bind(':id',$id);
    
            $this->db->execute();
        }

        public function actualizarCosecha($datos){

            $this->db->query("UPDATE cosecha SET num_kilos=:num_kilos, campaña_idcampaña=:campana, campo_idcampo=:campo, colaborador_idcolaborador=:colaborador WHERE idcosecha = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idcosecha']);
            $this->db->bind(':num_kilos',$datos['num_kilos']);
            $this->db->bind(':campana',$datos['campana']);
            $this->db->bind(':campo',$datos['campo']);
            $this->db->bind(':colaborador',$datos['colaborador']);

            $this->db->execute();

        }

        public function addCosecha($datos){
            $this->db->query("INSERT INTO cosecha (num_kilos, campaña_idcampaña, campo_idcampo, colaborador_idcolaborador) VALUES (:num_kilos, :campana, :campo, :colaborador)");

            $this->db->bind(':num_kilos',$datos['num_kilos']);
            $this->db->bind(':campana',$datos['campana']);
            $this->db->bind(':campo',$datos['campo']);
            $this->db->bind(':colaborador',$datos['colaborador']);

            $this->db->execute();

        }
    }

   

?>