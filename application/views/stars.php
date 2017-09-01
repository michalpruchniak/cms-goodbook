<?php
switch($log){
  case 1:
    echo '
      <div class="stars" data-toggle="tooltip" data-placement="bottom" title="nie jesteś zalogowany">
        <input type="radio" id ="star5" name="star" value="5" >
        <label for="star5"></label>
        <input type="radio" id ="star4" name="star" value="4">
        <label for="star4"></label>
        <input type="radio" id ="star3" name="star" value="3">
        <label for="star3"></label>
        <input type="radio" id ="star2" name="star" value="2">
        <label for="star2"></label>
        <input type="radio" id="star1" name="star" value="1">
        <label for="star1"></label>
      </div>
    ';
    break;
  case 2:
  echo '
    <form method="post" name="starRating">
    <div class="stars online">
      <input type="radio" id ="star5" name="star" value="5" >
      <label for="star5"></label>
      <input type="radio" id ="star4" name="star" value="4">
      <label for="star4"></label>
      <input type="radio" id ="star3" name="star" value="3">
      <label for="star3"></label>
      <input type="radio" id ="star2" name="star" value="2">
      <label for="star2"></label>
      <input type="radio" id="star1" name="star" value="1">
      <label for="star1"></label>
    </div>
    </form>
  ';
  break;
  case 3:
  echo  '<form method="post" name="starRating">
  <div class="stars online">';
  for($i=5; $i>=1; $i--){
    if(isset($checked) && $i == $checked){
      echo '<input type="radio" id ="star' .$i. '" name="star" value="'.$i.'" checked>';
    } else {
      echo '<input type="radio" id ="star' .$i. '" name="star" value="'.$i.'">';
    }
    echo '<label for="star' .$i. '"></label>';
  }
  echo '
  </div>
  </form>
  ';
}
?>
