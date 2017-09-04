<div class="form-group">
<?php
if($books->num_rows() > 0){
  $this->load->model('books');
  echo '<div class="books-list">';
  foreach($books->result() as $book){
    echo '
    <figure class="mini">
    <a href="' .base_url(). '/ksiazka/' .$book->prefix. '">
      <img src="' .$book->cover. '"
        data-toggle="tooltip" data-placement="bottom" data-html="true"
          title="<b>' .$book->title. '</b>
                 <br><small>' .$book->author. '</small>">
    </a>
    </figure>
    ';
  }
  echo '</div>';
}
if(isset($genre)){
  $config = array(
    'base_url'        => 'http://localhost/cms/ksiazki/' . $genre,
    'total_rows'      => $this->books->countBooks($genre),
    'per_page'        => 20,
    'full_tag_open'   => '<ul class="pagination">',
    'full_tag_close'  => '</ul>',
    'num_tag_open'    => '<li class="page-item">',
    'num_tag_close'   => '</li>',
    'cur_tag_open'    => '<li class="page-item active"><span class="page-link">',
    'cur_tag_close'   => '</span></li>',
    'attributes'      => array(
      'class' => 'page-link'
    )
  );

  $this->pagination->initialize($config);
  echo '<br />' .$this->pagination->create_links();

}
?>
</div>
