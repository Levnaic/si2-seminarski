<?php
  /* Forbid unauthorised acces */
  session_start();

  if(!isset($_SESSION['Uloga']))
    header("Location: ..\user_login.php");

  /* End of forbid unauthorised acces */
?>

<!doctype html>
<html lang= "en">
  <head>
    <!-- Required meta tags -->
    <meta charset= "utf-8">
    <meta name= "viewport" content= "width= device-width, initial-scale= 1, shrink-to-fit= no">

    <!-- Bootstrap CSS -->
    <link rel= "stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity= "sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel= "stylesheet" href= "../CSS/style.css">

    <title> Korisnički interfejs - početna </title>
  </head>
  <body>

    <!-- Navigation -->
    <header class= "p-3 bg-dark text-white">
        <div class= "container">
          <div class= "d-flex flex-wrap align-items-center justify-content-between">
            <a href= "/" class= "d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class= "bi me-2" width= "40" height= "32" role= "img" aria-label= "Bootstrap"><use xlink:href= "#bootstrap"></use></svg>
            </a>
    
            <ul class= "nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href= "user_home.php" class= "nav-link px-2 text-secondary"> Početna </a></li>
            </ul>
  <div class= "text-end">
              <button type= "button" class= "btn btn-warning" onclick= "document.location= '../odjava_data.php'"> Odjava </button>
            </div>
          </div>
        </div>
      </header>
      <!-- End of navigation -->

      <!-- Headline -->
        <div class= "position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center headline-picture-admin-interface-home">
          <div class= "col-md-5 p-lg-5 mx-auto my-5">
            <h1 class= "display-4 font-weight-normal headline-box"> Dobrodošli </h1>
            <p class= "lead font-weight-normal headline-box"> Ulogovan kao admin</p>
            <p class= "lead font-weight-normal headline-box"><!-- Results -->
      <h1 style= "text-align: center;"> Pregled podataka o korisnicima </h1>
      <table class="center">
        <tr>
          <th width= "9%"> Ime</th>
          <th width= "9%"> Prezime </th>
          <th width= "10%"> Email </th>
          <th width= "10%"> Sifra</th>
          <th width= "10%"> Uloga</th>
        </tr>
      
        <?php
          require "..\\Klase\\Konekcija.php";
          require "..\\Klase\\KorisnikClass.php";

          $KonekcijaObject= new Konekcija();
          $KonekcijaObject->Konektovanje();

          $KorisnikObject= new Korisnik($KonekcijaObject);
          $KorisnikObject	->CitanjeIzBaze();

          $IdKorisnika;

          while($row= $KorisnikObject	->lista->fetch_assoc()) {
            
            $IdKorisnika= $KorisnikObject	->IdKorisnika= $row["IdKorisnika"];
       
            $KorisnikObject	->imeKorisnika= $row["ImeKorisnika"];
            $KorisnikObject	->prezimeKorisnika= $row["PrezimeKorisnika"];
            $KorisnikObject	->EmailKorisnika= $row["EMailKorisnika"];
            $KorisnikObject	->Sifra= $row["Sifra"];
            $KorisnikObject	->Uloga= $row["Uloga"];

        ?>

        <tr>
          <td><?php echo $KorisnikObject	->imeKorisnika?></td>
          <td><?php echo $KorisnikObject	->prezimeKorisnika?></td>
          <td><?php echo $KorisnikObject	->EmailKorisnika?></td>
          <td><?php echo $KorisnikObject	->Sifra?></td>
          <td><?php echo $KorisnikObject	->Uloga?></td>
        </tr>

        <?php 
          } // End of while
        ?>
      
      </table>
      <!-- End of results -->
 </p>
          </div>
        </div> 
      <!-- End of headline -->

      </br>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src= "https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity= "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin= "anonymous"></script>
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity= "sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin= "anonymous"></script>

  </body>
</html>