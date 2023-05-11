<!-- PHP script -->
<?php
  session_start();
  require "Klase\\Konekcija.php";
  require "Klase\\KorisnikClass.php";

  $admin= "razredni";
  $korisnik= "admin";
  
  $Konekcija= new Konekcija();
  $Konekcija->Konektovanje();

  $Korisnik= new Korisnik($Konekcija);

  $Korisnik->email= $_POST["email"];
  $Korisnik->sifraHash= md5($_POST["lozinka"]);

  $Korisnik->Provera();

  if($Korisnik->postoji== 1){
    if($Korisnik->uloga== $korisnik){
      $_SESSION["Uloga"]= $Korisnik->uloga;
      header("Location: .\User\user_home.php");
    }

    else if($Korisnik->uloga== $admin){
      $_SESSION["Uloga"]= $Korisnik->uloga;
      header("Location: .\Admin\admin_home.php");
    }
  }
  else header("Location: user_login.php");
?>
<!-- End of PHP script -->