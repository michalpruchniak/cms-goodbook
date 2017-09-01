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

  public function saveVote($user, $book, $rate){
    if($this->userRate($user, $book) && $this->session->userdata('userID') == $user){
      $data = array(
                     'rate' => $rate
                  );
      $where = array(
        'user' => $user,
        'book' => $book
      );
      $this->db->update('rate', $data, "user=" . $user);

    } else if(!$this->userRate($user, $book) && $this->session->userdata('userID') == $user) {
      $data = array(
        'user' => 38,
        'book' => 38,
        'rate' => $rate
      );
      $this->db->insert('rate', $data);
    }
  }
}
?>
