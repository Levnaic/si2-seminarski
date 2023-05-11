<!-- PHP script -->
<?php
    require "..\\Klase\\Konekcija.php";
    require "..\\Klase\\UcenikClass.php";

    $imeUcenika= $_POST['imeUcenika'];
    $prezimeUcenika= $_POST['prezimeUcenika'];
    $JMBG= $_POST['JMBG'];
    $adresa= $_POST['adresa'];
    $mesto= $_POST['mesto'];
    $IdRazreda= $_POST['IdRazreda'];
    
    $Konekcija= new Konekcija();
    $Konekcija->Konektovanje();

    $Ucenik= new Ucenik($Konekcija);
    $Ucenik->DodajUcenika($imeUcenika, $prezimeUcenika,$JMBG ,$adresa, $mesto, $IdRazreda);

    $Ucenik->UpisUBazuUcenika();

    header("Location: admin_ucenici_input.php");
?>
<!-- End of PHP script -->