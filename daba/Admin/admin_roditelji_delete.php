<?php
    require "..\\Klase\\Konekcija.php";
    require "..\\Klase\\RoditeljClass.php";

    $Konekcija= new Konekcija();
    $Konekcija->Konektovanje();

    $Roditelj= new Roditelj($Konekcija);
    $Roditelj->IdRoditelja= $_GET['IdRoditelja'];
    $Roditelj->ObrisiRoditelja();

    header("Location: admin_roditelji.php");
?>