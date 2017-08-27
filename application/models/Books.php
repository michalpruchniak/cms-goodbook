<?php
class Books extends CI_Model {
  public function pageBooks($page, $how){
    if($page==1){
      $from =  0;
    } else {
      $from = $page*$how - $how;
    }
    $to = $from + $how;

    $query = $this->db->query("SELECT * FROM books LIMIT $how OFFSET $from");
    return $query->result();
  }
}
?>
