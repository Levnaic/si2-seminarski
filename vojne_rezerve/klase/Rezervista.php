<?php 
    class Rezervista{
        public $konekcija;
        public $listaRezervista;
        
        public $idRezerviste;

        public $imeRezerviste;
        public $prezimeRezerviste;
        public $datumRodjenja;
        public $emailRezerviste;
        public $pol;
        public $adresa;
        public $mesto;

        public $idKasarne;

        public $filterVrednost;

        public function __construct($Konekcija){
            $this->konekcija = $Konekcija;
        }

        public function DodajRezervistu($imeRezerviste, $prezimeRezerviste, $datumRodjenja, $emailRezerviste, $pol, $adresa, $mesto, $idKasarne){
            $this->imeRezerviste = $imeRezerviste;
            $this->prezimeRezerviste = $prezimeRezerviste;
            $this->datumRodjenja = $datumRodjenja;
            $this->emailRezerviste = $emailRezerviste;
            $this->pol = $pol;
            $this->adresa = $adresa;
            $this->mesto = $mesto;
            $this->idKasarne = $idKasarne;
        }

        public function UpisUBazu(){
            $query = "INSERT INTO REZERVISTA (ImeRezerviste, PrezimeRezerviste, DatumRodjenja, EmailRezerviste, Pol, Adresa, Mesto, IdKasarne) 
            VALUES ('$this->imeRezerviste', '$this->prezimeRezerviste', '$this->datumRodjenja', '$this->emailRezerviste', '$this->pol', '$this->adresa', '$this->mesto', '$this->idKasarne')";

            $this->konekcija->otvorena_konekcija->query($query);
        }
        
        public function CitanjeIzBaze(){
            $query = "SELECT * FROM REZERVISTA";

            $this->listaRezervista = $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaRezervista;
        }

        public function ObrisiRezervistu(){
            $query= "DELETE FROM REZERVISTA WHERE IdRezerviste = '$this->idRezerviste'";
           
            $this->konekcija->otvorena_konekcija->query($query);        
        }

        public function IzmeniRezervistu(){
            $query = "UPDATE REZERVISTA SET ImeRezerviste = '$this->imeRezerviste', PrezimeRezerviste = '$this->prezimeRezerviste', DatumRodjenja = '$this->datumRodjenja', EmailRezerviste = '$this->emailRezerviste', Pol = '$this->pol', Adresa = '$this->adresa', Mesto = '$this->mesto', IdKasarne = '$this->idKasarne' 
            WHERE IdRezerviste = '$this->idRezerviste'";

            $this->konekcija->otvorena_konekcija->query($query);
        }

        public function PrikazFilter(){
            $query = "SELECT * FROM REZERVISTA WHERE PrezimeRezerviste = '$this->filterVrednost'";
            
            $this->listaRezervista = $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaRezervista;
        }

        public function CitajRezervistuPrekoID($idRezerviste){
            $query = "SELECT * FROM REZERVISTA WHERE IdRezerviste = '$idRezerviste'";
            
            $this->listaRezervista = $this->konekcija->otvorena_konekcija->query($query);
            
            return $this->listaRezervista;        
        }

        public function CitajRezervistuPrekoKasarne($idKasarne){
            $query = "SELECT * FROM REZERVISTA WHERE IdKasarne = '$idKasarne'";

            $this->listaRezervista = $this->konekcija->otvorena_konekcija->query($query);

            return $this->listaRezervista;
        }
    }

?>