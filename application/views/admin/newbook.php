<div class="form-group">
<?php
  $this->load->helper('form');
  $data = array('method' => 'post');
  if(isset($newbook_errors)){
    echo $newbook_errors;
  }
  echo form_open_multipart('', $data);
  $titleData = array(
        'name'  => 'title',
        'id'    => 'title',
        'class' => 'form-control',
        'value' => set_value('title')
);
echo '<label for="title">Tytuł książki</label>';
echo form_input($titleData);

$authorData = array(
              'name'    => 'author',
              'id'      => 'author',
              'class'   => 'form-control',
               'value'  => set_value('author'));
echo '<label for="author">Autor</label>';
echo form_input($authorData);

$genre = array(
  'cryme'    => 'Kryminał',
  'dystopia' => 'Dystopia',
  'sci-fi'   => 'Science Fiction',
  'fantasy'  => 'Fantasy',
  'facts'    => 'Literatura faktu',
  'horror'   => 'Horror'
);
$genreData = array(
  'id'   => 'genre'
);
echo '<label for="genre">Gatunek</label>';
echo form_dropdown('genre', $genre, '', 'class="form-control"');

$yearData = array(
              'name'    => 'year',
              'id'      => 'year',
              'type'    => 'number',
              'class'   => 'form-control',
              'value'  => set_value('year'));
echo '<label for="year">Rok wydania</label>';
echo form_input($yearData);

$describeData = array(
              'name'    => 'describe',
              'id'      => 'describe',
              'class'   => 'form-control',
              'value'  => set_value('describe'));
echo '<label for="year">Opis</label>';
echo form_textarea($describeData);

$activePrefix = array(
              'name'    => 'activePrefix',
              'id'      => 'activePrefix',
              'class'   => 'form-check-input');
echo '<div class="form-check">';
echo '<label class="form-check-label">';
echo form_checkbox($activePrefix);
echo "Wprowadź prefix samodzielnie</label></div>";
$prefixData = array(
              'name'    => 'prefix',
              'id'      => 'prefix',
              'class'   => 'form-control',
            'readonly' => '');
echo '<label for="author">Prefix</label>';
echo form_input($prefixData);
echo '<label>Wybierz okładkę</label>';
echo '<input type="file" class="form-control-file" name="coverimg" size="20" />';
$submitData = array(
            'value'     => 'Dodaj',
             'class'    => 'btn btn-outline-info my-2 my-sm-0');
echo form_submit($submitData);

?>
</div>
