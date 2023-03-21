<?php

    class Balance{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerIngresos(){
            $this->db->query("SELECT * FROM ingresos");

            return $this->db->registros();
        }

        public function obtenerTipos(){
            $this->db->query("SELECT * FROM tipo");

            return $this->db->registros();
        }

        public function obtenerGastos(){
            $this->db->query("SELECT * FROM gastos");

            return $this->db->registros();
        }

        public function obtenerIngresoId($id){
            $this->db->query("SELECT * FROM ingresos WHERE idingresos = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }

        public function obtenerGastoId($id){
            $this->db->query("SELECT * FROM gastos WHERE idgastos = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }

        public function borrarIngreso($id){
            $this->db->query("DELETE FROM ingresos WHERE idingresos = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function borrarGasto($id){
            $this->db->query("DELETE FROM gastos WHERE idgastos = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function agregarGasto($datos){

            // print_r($datos);exit();

            $this->db->query("INSERT INTO gastos(concepto, cuenta_destino, fecha, cantidad, banco, tipo)
                                        VALUES (:concepto, :cuenta_destino, :fecha, :cantidad, :banco, :tipo)");
            
            $this->db->bind(':concepto', $datos['concepto']);
            $this->db->bind(':cuenta_destino', $datos['cuenta_destino']);
            $this->db->bind(':fecha', $datos['fecha']);
            $this->db->bind(':cantidad', $datos['cantidad']);
            $this->db->bind(':banco', $datos['banco']);
            $this->db->bind(':tipo', $datos['tipo']);

            if($id = $this->db->executeInsert()){                
                return true;
            }else {
                return false;
            }

        }

        public function agregarIngreso($datos){

            $this->db->query("INSERT INTO ingresos(concepto, fecha, cantidad, banco, tipo)
                                        VALUES (:concepto, :fecha, :cantidad, :banco, :tipo)");
            
            $this->db->bind(':concepto', $datos['concepto']);
            $this->db->bind(':fecha', $datos['fecha']);
            $this->db->bind(':cantidad', $datos['cantidad']);
            $this->db->bind(':banco', $datos['banco']);
            $this->db->bind(':tipo', $datos['tipo']);

            if($id = $this->db->executeInsert()){                
                return true;
            }else {
                return false;
            }

        }

        public function contarIngresos(){
            $this->db->query("SELECT * FROM ingresos");

            return $this->db->rowCount();
        }

        public function exportCSV(){

            //Cogemos los datos de la BBDD
            $gastos = $this->obtenerGastos();
            $ingresos = $this->obtenerIngresos();

            //En macOS el delimitador es ; en windows es ,
            $user_agent = getenv("HTTP_USER_AGENT");

            if(strpos($user_agent, "Win") !== FALSE)
            $os = "Windows";
            elseif(strpos($user_agent, "Mac") !== FALSE)
            $os = "Mac";

            if ($os == "Mac"){
                $delimiter = ";";
            }else{
                $delimiter = ",";
            }  
            $delimiter = ";";
            $filename = "datos-balance-" . date('Y.m-d') . ".csv";

            //Create a file pointer
            $f = fopen('php://memory', 'w');

            //Set column headers ingresos
            $headerIng = array('INGRESOS');
            fputcsv($f, $headerIng, $delimiter); 

            $fieldsIng = array('ID', 'Concepto', 'Fecha', 'Cantidad', 'Banco', 'Tipo');
            fputcsv($f, $fieldsIng, $delimiter); 

            // Escribimos los datos en el CSV
            foreach($ingresos as $row){
                $lineData = array($row->idingresos, $row->concepto, $row->fecha, $row->cantidad, $row->banco, $row->tipo);
                fputcsv($f, $lineData, $delimiter);
            }

            //Lo mismo que ingresos pero con gastos
            $headerGas = array('GASTOS');
            fputcsv($f, $headerGas, $delimiter); 
            $fieldsGas = array('ID', 'Concepto', 'Fecha', 'Cantidad', 'Banco', 'Tipo', 'Cuenta destino');
            fputcsv($f, $fieldsGas, $delimiter); 

            foreach($gastos as $row){
                $lineData = array($row->idgastos, $row->concepto, $row->fecha, $row->cantidad, $row->banco, $row->tipo, $row->cuenta_destino);
                fputcsv($f, $lineData, $delimiter);
            }

            //Volvemos al principio del archivo
            fseek($f, 0);

            //Set headers to download file rather than display it
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename=' . $filename);

            fpassthru($f);
            fclose($f);
            exit;
        }
    }

?>