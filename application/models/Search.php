<?php
class Search extends CI_Model {

  public function showResults($title){
      if($title==false){
        return false;
      } else {
        $this->db->from('books');
        $this->db->like('title', $title);
        $this->db->limit(4);
        $query = $this->db->get();
        return $query;
      }
  }
}
?>
