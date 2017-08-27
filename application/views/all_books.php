<div class="form-group">
<?php
if($books > 0){
  foreach($books as $book){
    echo '<br>';
    echo $book->bookID . ' ';
    echo $book->title;
  }
}

?>
</div>
