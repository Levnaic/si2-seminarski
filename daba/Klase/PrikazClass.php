<!-- PHP script -->
<?php
    class Prikaz{
      
        public $konekcija;
        public $listaPrikaza;

        public $filter;

        public $datum;
        public $imeRoditelja;
        public $prezimeRoditelja;
        public $imeRazrednog;
        public $prezimeRazrednog;
        public $razred;
        public $broj;

        public function __construct($Konekcija){
            $this->konekcija= $Konekcija;
        }

        public function DodajPrikaz($datum, $imeRoditelja, $prezimeRoditelja, $imeRazrednog, $prezimeRazrednog,$razred, $broj){
            $this->datum= $datum;
            $this->imeRoditelja= $imeRoditelja;
            $this->prezimeRoditelja= $prezimeRoditelja;
            $this->imeRazrednog= $imeRazrednog;
            $this->prezimeRazrednog= $prezimeRazrednog;
            $this->razred= $razred;
            $this->broj= $broj;
        }

        


        public function CitanjeIzBazePrikazi(){
            $query= "SELECT raspored_roditeljskih_sastanaka	.Datum, roditelj.ImeRoditelja, roditelj.PrezimeRoditelja, razredni_staresina.ImeRazrednog, razredni_staresina.PrezimeRazrednog, razred.Razred, razred.Broj FROM raspored_roditeljskih_sastanaka	 INNER JOIN razred ON raspored_roditeljskih_sastanaka	.IdRazreda = razred.IdRazreda INNER JOIN razredni_staresina ON razred.IdRazreda = razredni_staresina.IdRazreda INNER JOIN ucenik ON razred.IdRazreda = ucenik.IdRazreda INNER JOIN roditelj ON ucenik.IdUcenika = roditelj.IdUcenika";

            $this->listaPrikaza= $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaPrikaza;
        }
        
        
        
        public function CitanjeIzBazePrikaziFilter($filter){
            $query= "SELECT raspored_roditeljskih_sastanaka	.Datum, roditelj.ImeRoditelja, roditelj.PrezimeRoditelja, razredni_staresina.ImeRazrednog, razredni_staresina.PrezimeRazrednog, razred.Razred, razred.Broj FROM raspored_roditeljskih_sastanaka	 INNER JOIN razred ON raspored_roditeljskih_sastanaka	.IdRazreda = razred.IdRazreda INNER JOIN razredni_staresina ON razred.IdRazreda = razredni_staresina.IdRazreda INNER JOIN ucenik ON razred.IdRazreda = ucenik.IdRazreda INNER JOIN roditelj ON ucenik.IdUcenika = roditelj.IdUcenika WHERE Razred =  '" . $filter . "' ORDER BY ImeRoditelja";

            $this->listaPrikaza= $this->konekcija->otvorena_konekcija->query($query);
            return $this->listaPrikaza;
        }


    }
?>
<!-- End of PHP script -->