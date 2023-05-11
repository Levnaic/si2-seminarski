<!-- PHP script -->
<?php
   class RoditeljskiR{
        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }
        public function CitanjeIzBazePrikaziFilter(){
            $query= "SELECT raspored_roditeljskih_sastanaka.Datum, razredni_staresina.ImeRazrednog, razredni_staresina.PrezimeRazrednog, razred.Razred, razred.Broj FROM raspored_roditeljskih_sastanaka	 INNER JOIN razred ON raspored_roditeljskih_sastanaka	.IdRazreda = razred.IdRazreda INNER JOIN razredni_staresina ON razred.IdRazreda = razredni_staresina.IdRazreda WHERE raspored_roditeljskih_sastanaka.Datum > NOW() + 1";

            $this->listaPrikaza= $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaPrikaza;
        }
    }
?>
<!-- End of PHP script -->