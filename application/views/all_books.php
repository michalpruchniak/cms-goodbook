<div class="form-group">
<?php
if($books->num_rows() > 0){
  $this->load->model('books');
  foreach($books->result() as $book){
    echo '<br>';
    echo $book->bookID . ' ';
    echo $book->title;
  }
}
$config = array(
  'base_url'        => 'http://localhost/cms/index.php/book/page/' . $genre,
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
?>
</div>
