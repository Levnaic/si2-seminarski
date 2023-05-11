<?php

class Korisnik{
    public $korisnickoIme;
    public $sifraHash;
    public $uloga;

    public $admin;
    public $konekcija;
    public $postoji;
    public $listKorisink;
    public $row;

    public $korisnickoImeProvera;
    public $hashProvera;

    public function __construct($Konekcija){
        $this->konekcija = $Konekcija;
    }

    public function provera(){
        $query = "SELECT KorisnickoIme, Sifra, Uloga FROM KORISNIK WHERE KorisnickoIme = '$this->korisnickoIme' AND Sifra = '$this->sifraHash'";

        $this->listKorisink=$this->konekcija->otvorena_konekcija->query($query);

        if($this->listKorisink){
            while($this->row = $this->listKorisink->fetch_assoc()){
                $this->korisnickoImeProvera = $this->row["KorisnickoIme"];
                $this->hashProvera = $this->row["Sifra"];
                $this->uloga = $this->row["Uloga"];
            
                if($this->korisnickoIme == $this->korisnickoImeProvera)
                if($this->sifraHash == $this->hashProvera)
                $this->postoji = 1;
            }
        }

        if($this->listKorisink == false){
            $this->postji = 0;
        }
    }
}
?>