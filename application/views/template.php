<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <?php
    echo '<link rel="stylesheet" href="' .base_url(). 'assets/css/main.css">';
    ?>
</head>

<body>
   <header class="container-fluid header-website">
     <?php
      $this->load->view('account');
     ?>
   </header>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">GoodBook</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategorie
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Kryminał</a>
          <a class="dropdown-item" href="#">Horror</a>
          <a class="dropdown-item" href="#">Literatura faktura</a>
          <a class="dropdown-item" href="#">Literatura piękna</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Autorzy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Moja biblioteczka</a>
      </li>
    </ul>
    <?php
    $this->load->view('search');
    ?>
  </div>

</nav>
<article class="container">
<?php
  if(isset($content)){
    echo $content;
  } else {
    echo '<div class="alert alert-danger">
    <strong>Błąd!</strong> Brak elementów do wyświetlenia
    </div>';
  }
?>
</article>
<footer class="container-fluid" bg-inverse>
copyright &copy; Michał Pruchniak
</footer>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
   <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <?php
    echo '<script src="' .base_url(). 'assets/js/main.js"></script>';
    ?>
</body>
</html>
