<?php
class Users extends CI_Model {

        public $username;
        public $mail;
        public $pass;

        public function new_user()
        {

          $this->username = trim(xss_clean($_POST['username']));
          $this->mail = trim(xss_clean($_POST['mail']));
          $this->pass = trim(xss_clean(sha1($_POST['pass'])));
          $this->db->insert('users', $this);
        }
        public function login(){
          $this->username = trim(xss_clean($_POST['username']));
          $this->pass = trim(xss_clean(sha1($_POST['pass'])));

          $query = $this->db->get_where('users', array(
                  'username' => $this->username,
                  'pass'     => $this->pass ));
          return $query->num_rows();

        }

        public function checkUserID(){
          $query = $this->db->get_where('users', array(
                        'username' => $this->username,
                        'pass'     => $this->pass ));
          return $query->row()->ID;
        }

        public function checkUserRow($id){
          $query = $this->db->get_where('users', array(
              'ID' => $id
          ));
          return $query->row();
        }

        public function updatePass($id, $pass){
          $pass = trim(xss_clean(sha1($pass)));
          $id = trim(xss_clean($id));
          $this->db->where('ID', $id);
          $this->db->update('users', array(
            'pass' => $pass
          ));
        }
}
?>
