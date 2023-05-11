<?php
    class Kasarna{
        public $konekcija;
        public $listaKasarni;

        public $idKasarne;

        public $imeKasarne;

        public function __construct($Konekcija){
            $this->konekcija = $Konekcija;
        }

        public function DodajKasarnu($ImeKasarne){
            $this->imeKasarne = $ImeKasarne;
        }

        public function CitanjeIzBazeKasarne(){
            $query = "SELECT * FROM Kasarna";

            $this->listaKasarni = $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaKasarni;
        }

        public function CitajKasarnuPrekoId($idKasarne){
            $query = "SELECT * FROM KASARNA WHERE IdKasarne = '$idKasarne'";
            
            $this->listaKasarni = $this->konekcija->otvorena_konekcija->query($query);
            
            return $this->listaKasarni;  
        }
    }
?>