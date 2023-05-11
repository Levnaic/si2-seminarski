<!-- PHP script -->
<?php
    class Raspored{
      
        public $konekcija;
        public $listaRasporeda;

        public $IdRasporeda;

        public $datum;
        public $idRazreda;

        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }

        public function DodajRaspored($datum,$idRazreda){
            $this->datum= $datum;
            $this->idRazreda= $idRazreda;
        }

        public function UpisUBazu(){
            $query= "INSERT INTO RASPORED (Datum, IdRazreda) VALUES 
                ('$this->datum', '$this->idRazreda')";
            
            $this->konekcija->otvorena_konekcija->query($query);
        }

        public function CitanjeIzBazeRasporeda()
        {
            $query= "SELECT * FROM Raspored";

            $this->listaRasporeda= $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaRasporeda;

        }
    }
?>
<!-- End of PHP script -->