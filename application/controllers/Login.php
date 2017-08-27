<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	private function newSession(){
		$this->load->model('users');

		$this->session->set_userdata('userID', $this->users->checkUserID());
	}
	public function index()
	{
		if($this->session->has_userdata('userID') ){
			echo $this->session->flashdata('userID');
			header('Location: ' . base_url());
		}
		$this->load->library('form_validation');
    $login_data = [];
    if(isset($_POST['username'])){
      $this->load->model('users');
      if($this->users->login() == 1 ){
				$this->newSession();
				header('Location: ' .base_url());
      } else {
        $login_data['login_errors'] = 'Nieprawidłowy login lub hasło';
        $data['content'] = $this->load->view('login', $login_data, true);
      }

    } else {
      $data['content'] = $this->load->view('login', $login_data, true);
    }
		$this->load->view('template', $data);
	}
}
