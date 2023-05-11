<!-- PHP script -->
<?php
    class Roditelj{
        public $konekcija;
        public $lista;
        public $lista2;

        public $IdRoditelja;

        public $imeRoditelja;
        public $prezimeRoditelja;
        public $adresa;
        public $mesto;

        public $IdUcenika;


        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }

        public function DodajRoditelja($imeRoditelja, $prezimeRoditelja, $adresa, $mesto,$IdUcenika){
            $this->imeRoditelja= $imeRoditelja;
            $this->prezimeRoditelja= $prezimeRoditelja;
            $this->adresa= $adresa;
            $this->mesto= $mesto;
            $this->IdUcenika= $IdUcenika;
        }

        public function UpisUBazu(){
            $query= "INSERT INTO RODITELJ (ImeRoditelja, PrezimeRoditelja, Adresa, Mesto, IdUcenika) VALUES 
                ('$this->imeRoditelja', '$this->prezimeRoditelja', '$this->adresa', '$this->mesto', '$this->IdUcenika')";
            
            $this->konekcija->otvorena_konekcija->query($query);
        }

        public function CitanjeIzBaze(){
            $query= "SELECT * FROM RODITELJ";

            $this->lista= $this->konekcija->otvorena_konekcija->query($query);
            return $this->lista;
        }

        public function ObrisiRoditelja(){
            $query= "DELETE * FROM RODITELJ WHERE IdRoditelja= '$this->IdRoditelja'";

            $this->konekcija->otvorena_konekcija->query($query);
        }

        public function IzmeniRoditelja(){
            $query= "UPDATE RODITELJ SET ImeRoditelja= '$this->imeRoditelja', PrezimeRoditelja= '$this->prezimeRoditelja', Adresa= '$this->adresa', Mesto= '$this->mesto', IdUcenika= '$this->IdUcenika' 
             WHERE IdRoditelja= '$this->IdRoditelja'";

            $this->konekcija->otvorena_konekcija->query($query);
        }

    }

?>
<!-- End of PHP script -->
