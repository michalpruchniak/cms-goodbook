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

          $this->db->select('*')->from('users');
            $this->db->where('username', $this->username);
            $this->db->where('pass', $this->pass);
          return $this->db->count_all_results();

        }
}
?>
