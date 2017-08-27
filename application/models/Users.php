<?php
class Users extends CI_Model {

        public $username;
        public $mail;
        public $pass;

        public function new_user()
        {
          $this->load->helper('security');

          $this->username = trim(xss_clean($_POST['username']));
          $this->mail = trim(xss_clean($_POST['mail']));
          $this->pass = trim(xss_clean(sha1($_POST['pass'])));
          $this->db->insert('users', $this);
        }
        public function login(){
          $this->load->helper('security');
          $this->username = trim(xss_clean($_POST['username']));
          $this->pass = trim(xss_clean(sha1($_POST['pass'])));

          $query = $this->db->get_where('users', array(
                  'username' => $this->username,
                  'pass'     => $this->pass ));
          return $query->num_rows();

        }

        public function checkUserID(){
          $query = $this->db->select('ID')->get_where('users', array(
                        'username' => $this->username,
                        'pass'     => $this->pass ));
          return $query->row()->ID;
        }
}
?>
