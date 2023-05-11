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

    <title> Razredni starešina - štampa rezultata </title>
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
                <li><a href= "admin_ucenici_input.php" class="nav-link px-2 text-white"> Unos deca</a></li>
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

      </br>
      </br>

      <!-- Headline -->
      <div style= "text-align: center;">
        <h1> Rasporedi svih roditeljskih sastanaka </h1>
      </div>
      <!-- End of headline -->

<!-- Filter -->
</br>

<form style= "text-align: center;" action= "" method= "post">
  <label for="filter" class="sr-only"> Filter field </label>
  <input type="text" id="filter" placeholder= "Razred" size= "50px" style= "border-radius: 5px;" name= "filterValue">

  <input type= "submit" name= "allSubmit" value= "SVI"></input>
  <input type= "submit" name= "filterSubmit" value= "FILTRIRAJ"></input>
</form>
</br>
<!-- End of filter -->

<table style= "width: 90%;" class= "form-user-result-table">
  <tr>
        <th width= "12%" > Datum roditeljskog sastanka</th>
          <th> Ime roditelja </th>
          <th> Prezime roditelja </th>
          <th> Ime razrednog </th>
          <th> Prezime razrednog </th>
          <th> Razred </th>
          <th> Broj razreda </th>
  </tr>

  <?php
         require "..\\Klase\\Konekcija.php";
         require "..\\Klase\\PrikazClass.php";

   $KonekcijaObject= new Konekcija();
   $KonekcijaObject->Konektovanje();

   $PrikazObject= new Prikaz($KonekcijaObject);

  /* Filter mechanism */
  if(isset($_POST['filterSubmit'])){
    $filterValue= $_POST['filterValue'];
    $PrikazObject->CitanjeIzBazePrikaziFilter($filterValue);
  }

  else{
    $PrikazObject->CitanjeIzBazePrikazi();

    //echo 'allSubmit';
  }
  /* End of filter mechanism */

  while($row= $PrikazObject->listaPrikaza->fetch_assoc()) {
    $PrikazObject->datum = $row["Datum"];
    $PrikazObject->imeRoditelja= $row["ImeRoditelja"];
    $PrikazObject->prezimeRoditelja= $row["PrezimeRoditelja"];
    $PrikazObject->imeRazrednog= $row["ImeRazrednog"];
    $PrikazObject->prezimeRazrednog= $row["PrezimeRazrednog"];
    $PrikazObject->razred= $row["Razred"];
    $PrikazObject->broj= $row["Broj"];
?>

<tr>
          <td><?php echo $PrikazObject->datum?></td>
          <td><?php echo $PrikazObject->imeRoditelja?></td>
          <td><?php echo $PrikazObject->prezimeRoditelja?></td>
          <td><?php echo $PrikazObject->imeRazrednog?></td>
          <td><?php echo $PrikazObject->prezimeRazrednog?></td>
          <td><?php echo $PrikazObject->razred?></td>
          <td><?php echo $PrikazObject->broj?></td>
</tr>
<?php 
        }
      ?>
</table>
<!-- End of results -->


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src= "https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity= "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin= "anonymous"></script>
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity= "sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin= "anonymous"></script>

  </body>
</html>