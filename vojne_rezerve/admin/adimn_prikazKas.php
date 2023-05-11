<!-- php deo -->
<?php
  session_start();

  if(!isset($_SESSION['Uloga']) && !$_SESSION['Uloga']=='admin')
    header("Location: ..\userLogin.php");
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/grb_tab.png" />
    <link rel="stylesheet" href="../css/admin_prikaz.css" />
    <title>Prikaz po kasarnama</title>
  </head>
  <body>
    <?php include '../delovi/admin_header.php'?>
    <?php
      require "..\\klase\\Konekcija.php";
      require "..\\klase\\Rezervista.php";
      require "..\\klase\\Kasarna.php";

      $Konekcija = new Konekcija("../klase/ParametriKonekcije.xml");
      $Konekcija->Konektovanje();

      $Rezervista = new Rezervista($Konekcija);

      $Kasarna = new Kasarna($Konekcija);


      function ispisKasarne($Rezervista, $Kasarna, $idKasarne){
      $Rezervista->CitajRezervistuPrekoKasarne($idKasarne);
      $Kasarna->CitajKasarnuPrekoId($idKasarne);

      while($row = $Kasarna->listaKasarni->fetch_assoc()){
        $Kasarna->imeKasarne = $row["ImeKasarne"];
      }
    ?>
    <section class="kasarneContainer">
      <p style="text-align: center;">Kasarna: <?php echo $Kasarna->imeKasarne?></p>
    </section>
    <section class="tableContainer">
      <table>
        <tr>
          <th>Id Rezerviste</th>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Datum rođenja</th>
          <th>Email</th>
          <th>Pol</th>
          <th>Adresa stanovanja</th>
          <th>Mesto stanovanja</th>
          <th>Kasarna</th>
        </tr>
    <?php
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

    <tr>
      <td><?php echo $Rezervista->idRezerviste ?></td>
      <td><?php echo $Rezervista->imeRezerviste?></td>
      <td><?php echo $Rezervista->prezimeRezerviste?></td>
      <td class="datum"><?php echo $Rezervista->datumRodjenja?></td>
      <td><?php echo $Rezervista->emailRezerviste?></td>
      <td><?php echo $Rezervista->pol?></td>
      <td><?php echo $Rezervista->adresa?></td>
      <td><?php echo $Rezervista->mesto?></td>
      <td><?php echo $Kasarna->imeKasarne?></td>
    </tr>
    <?php }?>
      </table>
    </section>
    <?php }?>

    <?php
      ispisKasarne($Rezervista, $Kasarna, 1);  
      ispisKasarne($Rezervista, $Kasarna, 2);  
      ispisKasarne($Rezervista, $Kasarna, 3);  
    ?>

    <?php include '../delovi/admin_footer.php'?>
    <script src="../js/prikaz.js"></script>
  </body>
</html>
