<?php
    Class Konekcija{

        public $FullNameDb;

        private $parametersLocation;

        private $host;
        private $user;
        private $password;
        private $dbPrefix;
        private $dbName ;

        private $XMLParametri;

        public function __construct($NewParametersLocation){
            $this->parametersLocation = $NewParametersLocation;
            $this->UcitajParametreKonekcije($this->parametersLocation);
        }

        private function UcitajParametreKonekcije($XMLParametri){
            $xml = simplexml_load_file($XMLParametri) or die("Greška: Ne postoji fajl ParametriKonekcije.xml");

            $this->host = $xml->host;
            $this->user = $xml->korisnik;
            $this->password = $xml->sifra;
            $this->dbPrefix = $xml->prefiks_baze_podataka;
            $this->dbName = $xml->naziv_baze_podataka;
            $this->FullNameDb= $this->dbPrefix.$this->dbName;
        }

        public function Konektovanje(){
            $this->otvorena_konekcija = new mysqli($this->host, $this->user, $this->password, $this->FullNameDb);
        }

        public function Diskonektovanje(){
            mysqli_close($this->otvorena_konekcija);
        }
    }
?>

