<ul>
<?php
if($element==false){
  echo '';
} else {
  foreach($element->result() as $book){
    echo '<a href="' .base_url(). 'ksiazka/' .$book->prefix. '"><li>' .$book->title . '</li></a>';
  }

}
?>
</ul>
