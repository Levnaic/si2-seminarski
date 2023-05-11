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

    <title> Razredni starešina - pregled kandidata </title>
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
        <div class= "position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center headline-picture-admin-interface-recruits">
          <div class= "col-md-5 p-lg-5 mx-auto my-5">
            <h1 class= "display-4 font-weight-normal headline-box"> Sekcija za pregled roditelja </h1>
            <p class= "lead font-weight-normal headline-box"> U ovoj sekciji razredni starešina ima detaljan pregled podataka o roditeljima. </p>
          </div>
        </div> 
      <!-- End of headline -->

      <!-- Results -->
      <h1 style= "text-align: center;"> Pregled podataka o roditeljima </h1>
      
      </br>

      <table style= "width: 90%;" class= "form-admin-recruit-table">
        <tr>
          <th width= "9%"> Ime</th>
          <th width= "9%"> Prezime </th>
          <th width= "10%"> Adresa </th>
          <th width= "10%"> Mesto</th>
          <th width= "10%"> Id ucenika</th>
          <th> Izmena </th>
          <th> Brisanje </th>
        </tr>
      
        <?php
          require "..\\Klase\\Konekcija.php";
          require "..\\Klase\\RoditeljClass.php";

          $KonekcijaObject= new Konekcija();
          $KonekcijaObject->Konektovanje();

          $RoditeljObject= new Roditelj($KonekcijaObject);
          $RoditeljObject->CitanjeIzBaze();

          $IdRoditelja;

          while($row= $RoditeljObject->lista->fetch_assoc()) {
            
            $IdRoditelja= $RoditeljObject->IdRoditelja= $row["IdRoditelja"];
       
            $RoditeljObject->imeRoditelja= $row["ImeRoditelja"];
            $RoditeljObject->prezimeRoditelja= $row["PrezimeRoditelja"];
            $RoditeljObject->adresa= $row["Adresa"];
            $RoditeljObject->mesto= $row["Mesto"];
            $RoditeljObject->IdUcenika= $row["IdUcenika"];

        ?>

        <tr>
          <td><?php echo $RoditeljObject->imeRoditelja?></td>
          <td><?php echo $RoditeljObject->prezimeRoditelja?></td>
          <td><?php echo $RoditeljObject->adresa?></td>
          <td><?php echo $RoditeljObject->mesto?></td>
          <td><?php echo $RoditeljObject->IdUcenika?></td>

          <td><a href="admin_roditelji_alter.php? id=<?php echo $IdRoditelja; ?>" > Izmeni </a></td>
          <td><a href="admin_roditelji_delete.php?  id=<?php echo $IdRoditelja; ?>"> Obriši </a></td>


        </tr>

        <?php 
          } // End of while
        ?>
      
      </table>
      <!-- End of results -->

</br>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src= "https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity= "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin= "anonymous"></script>
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity= "sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin= "anonymous"></script>

  </body>
</html>