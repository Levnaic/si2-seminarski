<?php
    session_start();

    require "..\\klase\\Konekcija.php";
    require "..\\klase\\Rezervista.php";
    require "..\\klase\\Kasarna.php";
    
    $idRezerviste = $_SESSION['IdRezerviste'];
    $imeRezerviste = $_POST['ime'];
    $prezimeRezerviste = $_POST['prezime'];
    $datumRodjenja = $_POST['godinaR'];
    $emailRezerviste = $_POST['email'];
    $adresa = $_POST['adresa'];
    $mesto = $_POST['mesto'];
    if (isset($_POST['polM'])) $pol = 'Muško';
    if (isset($_POST['polZ'])) $pol = 'Žensko';
    if($_POST['kasarna'] == 'arcibald') $idKasarne = 1;
    if($_POST['kasarna'] == 'spanskih') $idKasarne = 2;
    if($_POST['kasarna'] == 'majevica') $idKasarne = 3;

    $Konekcija = new Konekcija("../klase/ParametriKonekcije.xml");
    $Konekcija->Konektovanje();

    $Rezervista = new Rezervista($Konekcija);
    $Rezervista->idRezerviste = $_SESSION['IdRezerviste'];
    $Rezervista->DodajRezervistu($imeRezerviste, $prezimeRezerviste, $datumRodjenja, $emailRezerviste, $pol, $adresa, $mesto, $idKasarne);
    $Rezervista->IzmeniRezervistu();

    header("Location: admin_izmenaIBrisanje.php");

?>