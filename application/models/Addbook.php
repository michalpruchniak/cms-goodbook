<?php
class Addbook extends CI_Model {

  public function addNewBook($order){
      $query = $this->db->insert_string('books', $order);

      $this->db->query($query);
  }

}
?>
