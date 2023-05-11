<?php
    class Korisnik{
        public $email;
        public $imeKorisnika;
        public $prezimeKorisnika;
        public $sifra;
        public $sifraHash;
        public $uloga;

        public $admin;
        public $konekcija;
        public $postoji;
        public $listKorisnik;
        public $row;

        public $emailprovera;
        public $hashprovera;

        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }

        public function Provera(){
            $query= "SELECT EMailKorisnika, Sifra, Uloga FROM KORISNIK WHERE EMailKorisnika= '$this->email' AND Sifra= '$this->sifraHash' ";

            $this->listKorisnik=$this->konekcija->otvorena_konekcija->query($query);

            if($this->listKorisnik){
                while($this->row= $this->listKorisnik->fetch_assoc()){
                    $this->emailprovera= $this->row["EMailKorisnika"];
                    $this->hashprovera= $this->row["Sifra"];
                    $this->uloga= $this->row["Uloga"];

                    if($this->email== $this->emailprovera)
                        if($this->sifraHash== $this->hashprovera)
                            $this->postoji= 1;
                }
            }
            if($this->listKorisnik== false){
                $this->postoji= 0;
            }
        }

        public function CitanjeIzBaze(){
            $query= "SELECT * FROM KORISNIK";

            $this->lista= $this->konekcija->otvorena_konekcija->query($query);
            return $this->lista;
        }

        


    }
?>