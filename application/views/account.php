<?php
  if($this->session->has_userdata('userID')){
    echo '<a href="' .base_url(). 'zmienhaslo" type="button" class="btn btn-success">Zmien hasło</a>';
    if($this->session->userdata('admin') === true){
      echo '<a href="' .base_url(). 'admin/newbook" type="button" class="btn btn-success">Dodaj książkę</a>';
    }
    echo '<a href="' .base_url(). 'logout" type="button" class="btn btn-danger">Wyloguj</a>';
  } else {
    echo '
      <a href="' .base_url(). 'zaloguj" type="button" class="btn btn-success">Zaloguj</a>
      <a href="' .base_url(). 'zarejestruj" type="button" class="btn btn-primary">Zarejestruj się</a>
    ';
  }
?>
