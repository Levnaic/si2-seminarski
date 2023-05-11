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
    <link rel= "stylesheet" href= "..\CSS\style.css">

    <!-- Hide number input arrows -->
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
       -webkit-appearance: none;
        margin: 0;
        }
  
        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
      </style>
      <!-- End of hide number input arrows -->

    <title> Razredni starešina - unos roditelja </title>
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
                <li><a href= "admin_home.php" class= "nav-link px-2 text-secondary"> Početna </a></li>
                <li><a href= "admin_roditelji.php" class="nav-link px-2 text-white"> Pregled roditelja </a></li>
                <li><a href= "admin_ucenici.php" class="nav-link px-2 text-white"> Pregled dece </a></li>
                <li><a href= "admin_roditelji_input.php" class="nav-link px-2 text-white"> Unos roditelja</a></li>
                <li><a href= "admin_ucenici_input.php" class="nav-link px-2 text-white"> Unos dece</a></li>
                <li><a href= "admin_print.php" class="nav-link px-2 text-white"> Zakazivanje roditeljskog sastanka </a></li>
                <li><a href= "admin_print_prikaz.php" class="nav-link px-2 text-white"> Pregled svih roditeljskih sastanaka </a></li>
            </ul>
  
            <div class= "text-end">
              <button type= "button" class= "btn btn-warning" onclick= "document.location= '../odjava_data.php'"> Odjava </button>
            </div>
          </div>
        </div>
      </header>
      <!-- End of navigation -->

      <!-- Headline -->
        <div class= "position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center headline-picture-admin-interface-unit-input">
          <div class= "col-md-5 p-lg-5 mx-auto my-5">
            <h1 class= "display-4 font-weight-normal headline-box"> Sekcija za unos roditelja </h1>
            <p class= "lead font-weight-normal headline-box"> U ovoj sekciji admin unosi podatke o roditeljima. </p>
          </div>
        </div>
      <!-- End of headline -->
      <!-- Input form -->
      <h1 style= "text-align: center;"> Forma za unos roditelja </h1>

      <div class="container" style= "text-align: center;">
        <form class="form-signin-user-form col-4 mx-auto" action= "admin_roditelji_input_data.php" method= "post">
            <img class="mb-4" src="../Images/Image2.png" alt="" width="140" height="140">

            </br>
            <label for="imeRoditelja" class="sr-only"> Ime roditelja </label>
            <input type="text" id="imeRoditelja" class="form-control" placeholder="Ime" autofocus="" required= "" name= "imeRoditelja">
            </br>
            <label for="prezimeRoditelja" class="sr-only"> Prezime roditelja </label>
            <input type="text" id="prezimeRoditelja" class="form-control" placeholder="Prezime" required= "" name= "prezimeRoditelja">
            </br>

            <label for="adresa" class="sr-only"> Adresa </label>
            <input type="text" id="adresa" class="form-control" placeholder="Adresa" required= "" name= "adresa">
            </br>

            <label for="mesto" class="sr-only"> Mesto </label>
            <input type="text" id="mesto" class="form-control" placeholder="Mesto" required= "" name= "mesto">
            </br>
              
            <label for= "idUcenika"> Id ucenika: </label>
            <select id= "idUcenika" class= "form-signin-user-form-combobox" style= "width: 100%;" name= "IdUcenika">
              

            <!-- Combobox containing a name of unit PHP -->
            <?php 
                $conn=mysqli_connect("localhost","root","","roditeljski_sastanci");

                if($conn->connect_error){
                  die("Greška prilikom konekcije ! ". $conn->connect_error);
                }

                else{
                  $query="SELECT * FROM Ucenik";
                  $records = mysqli_query($conn,$query);

                  while($data = mysqli_fetch_array($records)) {
            ?>
                    <option value= <?php echo $data['IdUcenika']; ?> ><?php echo $data['IdUcenika']; ?></option>
            <?php 
                } 
              }
            ?>
            <!-- End of combobox containing a name of unit PHP -->
            </select>
            </br></br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name= "snimi"> Snimi </button>
            <p class="mt-5 mb-3 text-muted">© 2021-2022</p>
          </form>
      </div>
      <!-- End of input form -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src= "https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity= "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin= "anonymous"></script>
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity= "sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin= "anonymous"></script>

  </body>
</html>