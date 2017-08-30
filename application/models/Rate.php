<?php
class Rate extends CI_Model {

  public function userRate($user, $book){
    $query = $this->db->get_where('rate', array(
      'user' => $user,
      'book' => $book
    ));
    if($query->num_rows()==1){
      return $query->row();
    } else {
      return false;
    }

  }
}
?>
