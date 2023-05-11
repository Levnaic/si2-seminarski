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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/grb_tab.png">
    <link rel="stylesheet" href="../css/admin_prikaz.css" />
    <title>Prikaz rezervista</title>
</head>
<body>
<?php include '../delovi/admin_header.php'; ?>

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
  require "..\\klase\\Konekcija.php";
  require "..\\klase\\Rezervista.php";

  $Konekcija = new Konekcija("../klase/ParametriKonekcije.xml");
  $Konekcija->Konektovanje();

  $Rezervista = new Rezervista($Konekcija);
  $Rezervista->CitanjeIzBaze();

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
    if($Rezervista->idKasarne==1) $prikazKasarne = 'dr. Arčibald Rajs';
    if($Rezervista->idKasarne==2) $prikazKasarne = 'Španskih boraca';
    if($Rezervista->idKasarne==3) $prikazKasarne = 'Majevica';
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
      <td><?php echo $prikazKasarne?></td>
    </tr>


<?php } ?>

</table>
</section>

<?php include '../delovi/admin_footer.php'; ?>
<script src="../js/prikaz.js"></script>
</body>
</html>