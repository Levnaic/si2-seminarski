<!-- PHP script -->
<?php
    class Razred{
        public $konekcija;
        public $listaRazreda;

        public $idRazreda;
        public $Razred;
        public $Broj;


        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }

        public function DodajRazred($Razred,$Broj){
            $this->Razred= $Razred;
            $this->Broj= $Broj;
        }

        public function CitanjeIzBazeRazreda()
        {
            $query= "SELECT * FROM Razred";

            $this->listaRazreda= $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaRazreda;

    }
}
?>
<!-- End of PHP script -->