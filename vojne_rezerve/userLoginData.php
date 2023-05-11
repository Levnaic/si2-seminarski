<?php
    session_start();
    require "Klase\\Konekcija.php";
    require "Klase\\Korisnik.php";

    $admin = "admin";
    $korisnik = "korisnik";

    $Konekcija = new Konekcija("klase/ParametriKonekcije.xml");
    $Konekcija->Konektovanje();

    $Korisnik = new Korisnik($Konekcija);

    $Korisnik->korisnickoIme = $_POST["korisnickoIme"];
    $Korisnik->sifraHash = md5($_POST["sifra"]);

    $Korisnik->Provera();

    if ($Korisnik->postoji == 1) {
        if ($Korisnik->uloga == $korisnik) {
            $_SESSION["Uloga"] = $Korisnik->uloga;
            header("Location: .\user\user_index.php");
        }

        else if ($Korisnik->uloga == $admin) {
             $_SESSION["Uloga"] = $Korisnik->uloga;
             header("Location: .\admin\admin_index.php");
        }
    }

    else header("Location: userLogin.php");
    ?>