<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">

    <title> Prijava </title>
  </head>
  <body class= "text-center">

    <!-- Navigation -->
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="index.php" class="nav-link px-2 text-secondary"> Početna </a></li>
              <li><a href= "prijava_roditelja.php" class="nav-link px-2 text-white"> Pregled roditeljskih sastanaka </a></li>
              <li><a href="skola.php" class="nav-link px-2 text-white"> Škola </a></li>
              <li><a href="o_nama.php" class="nav-link px-2 text-white"> O nama </a></li>
            </ul>
    
            
    
            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2" onclick="document.location='user_login.php'"> Prijava </button>
               
            </div>
          </div>
        </div>
      </header>
      <!-- End of navigation -->

      <!-- Sign in form -->
      <div class="container">
        <form class="form-signin col-4 mx-auto" action= "user_login_data.php" method= "post">
            <img class="mb-4" src="Images/Image2.png" alt="" width="140" height="140">
            <h1 class="h3 mb-3 font-weight-normal"> Prijavite se </h1>

            <label for="inputEmail" class="sr-only"> Email adress for login </label>
            <input type="email" class="form-control" placeholder="Email adresa" required="" autofocus="" name= "email">
            </br>

            <label for="inputPassword" class="sr-only"> Password for login </label>
            <input type="password" class="form-control" placeholder="Šifra" required="" name= "lozinka">
            </br>

            <div class="checkbox mb-3">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit"> Prijava </button>
            <p class="mt-5 mb-3 text-muted">© 2021-2022</p>
          </form>
      </div>
      <!-- End of sign in form -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>