<!-- PHP script -->
<?php
    session_start();

    require "..\\Klase\\Konekcija.php";
    require "..\\Klase\\RoditeljClass.php";

    $imeRoditelja= $_POST['imeRoditelja'];
    $prezimeRoditelja= $_POST['prezimeRoditelja'];
    $adresa= $_POST['adresa'];
    $mesto= $_POST['mesto'];
    $IdUcenika= $_POST['IdUcenika'];

    $Konekcija= new Konekcija();
    $Konekcija->Konektovanje();

    $Roditelj= new Roditelj($Konekcija);
    $Roditelj->DodajRoditelja($imeRoditelja, $prezimeRoditelja, $adresa, $mesto, $IdUcenika);

    $Roditelj->UpisUBazu();

    header("Location: admin_roditelji_input.php");
?>
<!-- End of PHP script -->