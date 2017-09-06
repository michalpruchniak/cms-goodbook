<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	private function newSession(){
		$this->load->model('users');

		$userID = $this->users->checkUserID();
		$this->session->set_userdata('userID', $userID);
		
		if($this->users->checkUserRow($userID)->admin == 1){
			$this->session->set_userdata('admin', true);
		} else {
			$this->session->set_userdata('admin', false);
		}
	}
	public function index()
	{
		if($this->session->has_userdata('userID') ){
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
