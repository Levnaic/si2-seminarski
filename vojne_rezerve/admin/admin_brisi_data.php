<?php
    require "..\\Klase\\Konekcija.php";
    require "..\\Klase\\Rezervista.php";

    $Konekcija = new Konekcija("../klase/ParametriKonekcije.xml");
    $Konekcija->Konektovanje();

    $Rezervista = new Rezervista($Konekcija);
    $Rezervista->idRezerviste = $_GET['id'];
    $Rezervista->ObrisiRezervistu();

    header("Location: admin_izmenaIBrisanje.php")
?>