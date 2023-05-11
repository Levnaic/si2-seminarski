<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/grb_tab.png">
    <link rel="stylesheet" href="css/prijava.css" />
    <title>Prijava</title>
  </head>
  <body>
    <?php include 'delovi/header.php'; ?>
    <h2>Prijava na nalog</h2>
    <div class="formContainer">
      <form action= "userLoginData.php" method= "post">
        <div class="formSection">
          <label for="korisnickoIme">Korisničko ime:</label>
          <input type="text" id="korisnickoIme" name="korisnickoIme" />
        </div>
        <div class="formSection">
          <label for="sifra">Šifra:</label>
          <input type="password" id="sifra" name="sifra"/>
        </div>
        <div class="formSection">
         <input type="submit" value="Prijava" id="formBtnP" class="btn" />
         <!-- <button type="submit">Prijava</button> -->
        </div>
      </form>
    </div>
  </body>
</html>
