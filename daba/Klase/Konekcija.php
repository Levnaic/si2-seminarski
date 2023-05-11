<!-- PHP script -->
<?php
    Class Konekcija{
        public $host= "localhost";
        public $user= "root";
        public $password= "";
        public $db= "roditeljski_sastanci";
        public $otvorena_konekcija;

        public function Konektovanje(){
            $this->otvorena_konekcija= new mysqli($this->host, $this->user, $this->password, $this->db);
        }
    }
?>
<!-- End of PHP script -->