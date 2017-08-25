<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->library('form_validation');
		$register=[];
		if(isset($_POST['username'])){
			$register['username'] = $_POST['username'];
			//set rules
			$this->form_validation->set_rules('username', 'Username',
			 				'trim|required|min_length[3]|max_length[15]|is_unique[users.username]');
			$this->form_validation->set_rules('mail', 'Email',
			 				'trim|required|valid_email|min_length[5]|max_length[40]|is_unique[users.mail]');
			$this->form_validation->set_rules('pass', 'Password',
			 				'trim|required|min_length[6]|max_length[35]');
			$this->form_validation->set_rules('repass', 'Re-password',
			 				'trim|required|min_length[6]|max_length[35]|matches[pass]');
			if($this->form_validation->run() == false){
				$data['content'] = validation_errors();
			} else {
				//register user
				try{
					$this->load->model('users');
					$this->users->new_user();
					$register_message = "Zarejestrowałeś się poprawnie";
				} catch(Exception $e){
					$register_message = 'Wystąpił błąd: ' . $e->getMessage();
				} finally {
					$data['content'] = $register_message;
				}
			}
		} else {
			$data['content'] = $this->load->view('register', $register, true);
		}

		$this->load->view('template', $data);
	}
}
