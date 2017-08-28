<?php
class Books extends CI_Model {
  public function countBooks(){
  $query = $this->db->get("books");
    return $query->num_rows();
  }

  public function pageBooks($limit, $from){

    $query = $this->db->query("SELECT * FROM books LIMIT $limit OFFSET $from");
    return $query;
  }
}
?>
