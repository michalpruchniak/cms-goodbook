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
}
?>
