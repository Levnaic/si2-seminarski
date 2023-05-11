<?php
  session_start();
  
  if(!isset($_SESSION['Uloga']) && !$_SESSION['Uloga']=='admin')
  header("Location: ..\userLogin.php");

  $_SESSION['IdRezerviste'] = $_GET['id'];

  require "..\\klase\\Konekcija.php";
  require "..\\klase\\Rezervista.php";

  $Konekcija = new Konekcija("../klase/ParametriKonekcije.xml");
  $Konekcija->Konektovanje();

  $Rezervista = new Rezervista($Konekcija);
  $Rezervista->CitajRezervistuPrekoID($_SESSION['IdRezerviste']);
  // $Rezervista->CitanjeIzBaze();

  while($row = $Rezervista->listaRezervista->fetch_assoc()){
    $Rezervista->idRezerviste = $row["IdRezerviste"];
    $Rezervista->imeRezerviste = $row["ImeRezerviste"];
    $Rezervista->prezimeRezerviste = $row["PrezimeRezerviste"];
    $Rezervista->datumRodjenja = $row["DatumRodjenja"];
    $Rezervista->emailRezerviste = $row["EmailRezerviste"];
    $Rezervista->pol = $row["Pol"];
    $Rezervista->adresa = $row["Adresa"];
    $Rezervista->mesto = $row["Mesto"];
    $Rezervista->idKasarne = $row["IdKasarne"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/grb_tab.png" />
    <link rel="stylesheet" href="../css/admin_izmena.css" />
    <title>Izmena Rezerviste</title>
  </head>
  <body>
    <h1>Forma za izmenu podataka</h1>
    <div class="formContainer">
      <form action="admin_izmena_data.php" method="post" onsubmit="return validacijaForme()">
        <div class="formSection">
          <label for="ime">Ime:</label>
          <?php echo "<input type='text' id='ime' name='ime'value='$Rezervista->imeRezerviste'/>"?>
        </div>
        <div class="formSection">
          <label for="prezime">Prezime:</label>
          <?php echo "<input type='text' id='prezime' name='prezime' value='$Rezervista->prezimeRezerviste' />"?>
        </div>
        <div class="formSection">
          <label for="godinaR">Datum rođenja:</label>
          <?php echo "<input type='date' id='godinaR' name='godinaR' value='$Rezervista->datumRodjenja' />"?>
        </div>
        <div class="formSection">
          <label for="email">Email:</label>
          <?php echo "<input type='email' id='email' name='email' value='$Rezervista->emailRezerviste' />"?>
        </div>
        <div class="formSectionCheckbox">
          <div class="checkboxSection">
            <label for="polM">Muško:</label>
            <?php 
              if ($Rezervista->pol == 'Muško') {
                echo "<input type='radio' id='polM' name='polM' data-pol='musko' class='checkbox' checked />";
              }
              else echo "<input type='radio' id='polM' name='polM' data-pol='musko' class='checkbox' />"
            ?>
          </div>
          <div class="checkboxSection">
            <label for="polZ">Zensko:</label>
            <?php
              if ($Rezervista->pol == 'Žensko'){
                echo "<input type='radio' id='polZ' name='polZ' data-pol='zensko' class='checkbox' checked/>";
              }
              else echo "<input type='radio' id='polZ' name='polZ' data-pol='zensko' class='checkbox' />"
            ?>
          </div>
        </div>
        <div class="formSection">
          <label for="adresa">Adresa stanovanja:</label>
          <?php echo "<input type='text' id='adresa' name='adresa' value='$Rezervista->adresa' />"?>
        </div>
        <div class="formSection">
          <label for="mesto">Mesto stanovanja:</label>
          <?php echo "<input type='text' id='mesto' name='mesto' value='$Rezervista->mesto' />"?>
        </div>
        <div class="formSection">
          <label for="kasarna">Kasarna:</label>
          <select name="kasarna" id="kasarna">
            <?php if ($Rezervista->idKasarne == 1){
              echo "
                <option value='arcibald' selected='selected'>dr. Rudolaf Arčibald Rajs</option>
                <option value='spanskih'>Španskih boraca</option>
                <option value='majevica'>Majevica</option> ";
            } if($Rezervista->idKasarne == 2) {
              echo "
                <option value='arcibald'>dr. Rudolaf Arčibald Rajs</option>
                <option value='spanskih' selected='selected'>Španskih boraca</option>
                <option value='majevica'>Majevica</option> ";
            } if($Rezervista->idKasarne == 3) {
              echo "
                <option value='arcibald'>dr. Rudolaf Arčibald Rajs</option>
                <option value='spanskih'>Španskih boraca</option>
                <option value='majevica' selected='selected'>Majevica</option> ";
            }
             ?>
          </select>
        </div>
        <div class="formSection">
          <input
            type="submit"
            id="formBtn"
            class="btn"
            name="formBtn"
            value="Pošalji podatke"
            onsubmit="validacijaForme()"
          />
        </div>
      </form>
      <?php }?>
    </div>
  <script src="../js/validacijaForme.js"></script>
  </body>
</html>
