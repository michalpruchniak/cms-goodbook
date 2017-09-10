<header class="header-book row">
<figure class="cover">
  <?php
  echo '<img src="' .base_url(). 'upload/' .$cover. '.png" alt="' .$title. '" />';
  ?>
</figure>
<div class="book-details">
  <h2 class="title"> <?php echo $title; ?></h2>
  <table class="table table-hover">
    <tbody>
      <tr>
        <td scope="row">Autor</td>
        <td><?php echo $author; ?></td>
      </tr>
      <tr>
        <td scope="row">Rok wydania</td>
        <td><?php echo $year; ?></td>
      </tr>
      <tr>
        <td scope="row">Ocena:</td>
        <td>
          <?php
            if(isset($stars)){
              echo $stars;
            }
          ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</header>
<div class="row">
  <h3>Opis</h3>
<p><?php echo $describebook; ?></p>
</div>
