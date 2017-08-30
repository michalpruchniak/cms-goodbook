<?php
class Books extends CI_Model {

  public function countBooks($genre="all"){
  if($genre=='all'){
    $query = $this->db->get("books");
  } else {
    $query = $this->db->get_where("books", array(
      'genre' => $genre
    ));
  }
    return $query->num_rows();
  }

  public function pageBooks($limit, $from, $genre){
    if($genre == 'all'){
      $query = $this->db->query("SELECT * FROM books LIMIT $limit OFFSET $from");
    } else {
      $query = $this->db->query("SELECT * FROM books
        WHERE genre='$genre' LIMIT $limit OFFSET $from");
    }
    return $query;
  }

  public function showBook($prefix){
    $query = $this->db->get_where('books', array(
      'prefix' => $prefix
    ));
    return $query->row();
  }
}
?>
