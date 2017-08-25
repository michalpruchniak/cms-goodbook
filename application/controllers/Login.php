<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	public function index()
	{
		$this->load->library('form_validation');
    $login_data = [];
    if(isset($_POST['username'])){
      $this->load->model('users');
      if($this->users->login() == 1 ){
        $data['content'] =  "Zalogowałeś się";
      } else {
        $login_data['login_errors'] = "Nieprawidłowy nick lub hasło";
        $data['content'] = $this->load->view('login', $login_data, true);
      }

    } else {
      $data['content'] = $this->load->view('login', $login_data, true);
    }
		$this->load->view('template', $data);
	}
}
