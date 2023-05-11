<!-- PHP script -->
<?php
    session_start();

    require "..\\Klase\\Konekcija.php";
    require "..\\Klase\\RoditeljClass.php";

    $imeRoditeljaIzmena= $_POST['imeRoditeljaIzmena'];
    $prezimeRoditeljaIzmena= $_POST['prezimeRoditeljaIzmena'];
    $adresaIzmena= $_POST['adresaIzmena'];
    $mestoIzmena= $_POST['mestoIzmena'];
    $idUcenikaIzmena= $_POST['IdUcenikaIzmena'];

    $Konekcija= new Konekcija();
    $Konekcija->Konektovanje();

    $Roditelj= new Roditelj($Konekcija);
    $Roditelj->IdRoditelja= $_SESSION['IdRoditelja'];
    $Roditelj->DodajRoditelja($imeRoditeljaIzmena, $prezimeRoditeljaIzmena, $adresaIzmena, $mestoIzmena,$idUcenikaIzmena);
    $Roditelj->IzmeniRoditelja();

    header("Location: admin_roditelji.php");
?>
<!-- End of PHP script -->