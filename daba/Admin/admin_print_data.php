<!-- PHP script -->
<?php
    session_start();

    require "..\\Klase\\Konekcija.php";
    require "..\\Klase\\RasporedClass.php";

    $datum= $_POST['datum'];
    $idRazreda= $_POST['idRazreda'];


    $Konekcija= new Konekcija();
    $Konekcija->Konektovanje();

    $Raspored= new Raspored($Konekcija);
    $Raspored->DodajRaspored($datum, $idRazreda);

    $Raspored->UpisUBazu();

    header("Location: admin_print.php");
?>
<!-- End of PHP script -->