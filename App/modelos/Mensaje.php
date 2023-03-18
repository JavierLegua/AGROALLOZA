<?php

    class Mensaje{

        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerUsuarios(){
            $this->db->query("SELECT * FROM usuario");

            return $this->db->registros();
        }


    }

?>