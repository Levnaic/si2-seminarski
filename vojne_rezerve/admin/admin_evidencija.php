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
    <link rel="icon" href="../img/grb_tab.png">
    <link rel="stylesheet" href="../css/admin_evidencija.css" />
    <title>Evidencija rezervi</title>
  </head>
  <body>
    <?php include '../delovi/admin_header.php'; ?>
    <div class="formContainer">
      <form action="admin_evidencija_data.php" method="post">
        <div class="formSection">
          <label for="ime">Ime:</label>
          <input type="text" id="ime" name="ime" />
        </div>
        <div class="formSection">
          <label for="prezime">Prezime:</label>
          <input type="text" id="prezime" name="prezime" />
        </div>
        <div class="formSection">
          <label for="godinaR">Datum rođenja:</label>
          <input type="date" id="godinaR" name="godinaR" />
        </div>
        <div class="formSection">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" />
        </div>
        <div class="formSectionCheckbox">
          <div class="checkboxSection">
            <label for="polM">Muško:</label>
            <input type="radio" id="polM" name="polM" data-pol="musko" class="checkbox" />
          </div>
          <div class="checkboxSection">
            <label for="polZ">Zensko:</label>
            <input type="radio" id="polZ" name="polZ" data-pol="zensko" class="checkbox" />
          </div>
        </div>
        <div class="formSection">
          <label for="adresa">Adresa stanovanja:</label>
          <input type="text" id="adresa" name="adresa"/>
        </div>
        <div class="formSection">
          <label for="mesto">Mesto stanovanja:</label>
          <input type="text" id="mesto" name="mesto" />
        </div>
        <div class="formSection">
          <label for="kasarna">Kasarna:</label>
          <select name="kasarna" id="kasarna">
            <option value="arcibald">dr. Rudolaf Arčibald Rajs</option>
            <option value="spanskih">Španskih boraca</option>
            <option value="majevica">Majevica</option>
          </select>
        </div>
        <div class="formSection">
          <input
            type="submit"
            id="formBtn"
            class="btn"
            name="formBtn"
            value="Pošalji podatke"
            onclick="validacijaForme()"
          />
        </div>
      </form>
    </div>
    <?php include '../delovi/admin_footer.php'; ?>
    <script src="../js/validacijaForme.js"></script>
  </body>
</html>
