<!-- PHP script -->
<?php
    class Ucenik{
        public $konekcija;
        public $listaUcenika;

        public $idUcenika;

        public $imeUcenika;
        public $prezimeUcenika;
        public $JMBG;
        public $adresa;
        public $mesto;
        public $IdRazreda;

        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }

        public function DodajUcenika($imeUcenika,$prezimeUcenika,$JMBG,$adresa,$mesto,$IdRazreda){
            $this->imeUcenika= $imeUcenika;
            $this->prezimeUcenika= $prezimeUcenika;
            $this->JMBG = $JMBG;
            $this->adresa= $adresa;
            $this->mesto = $mesto;
            $this->IdRazreda = $IdRazreda;
        }

        public function UpisUBazuUcenika(){
            $query= "INSERT INTO UCENIK (ImeUcenika, PrezimeUcenika, JMBG, adresa, mesto, IdRazreda) VALUES 
                ('$this->imeUcenika', '$this->prezimeUcenika', '$this->JMBG', '$this->adresa', '$this->mesto', '$this->IdRazreda')";
            
            $this->konekcija->otvorena_konekcija->query($query);
        }

        public function CitanjeIzBazeUcenika()
        {
            $query= "SELECT * FROM UCENIK";

            $this->listaUcenika= $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaUcenika;
        }

    }
?>
<!-- End of PHP script -->