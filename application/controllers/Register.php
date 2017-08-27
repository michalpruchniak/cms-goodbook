<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends CI_Controller {

	public function index()
	{
		if($this->session->has_userdata('userID') ){
			header('Location: ' . base_url());
		}
		$this->load->library('form_validation');
    $register_data=[];
		if(isset($_POST['username'])){
			//set rules
			$this->form_validation->set_rules('username', 'Username', array(
        'trim',
        'required',
        'min_length[3]',
        'max_length[15]',
        'is_unique[users.username]',
        'regex_match[/^[a-zA-Z0-9_-]{3,15}$/]'),
        array('regex_match' => 'Pole %s zawiera niedozwolone znaki')
      );
			$this->form_validation->set_rules('mail', 'Email', array(
        'trim',
        'required',
        'valid_email',
        'min_length[5]',
        'max_length[40]',
        'is_unique[users.mail]')
      );
			$this->form_validation->set_rules('pass', 'Password', array(
        'trim',
        'required',
        'min_length[6]',
        'max_length[35]',
        'regex_match[/^[a-zA-Z0-9@\._-]{6,35}$/]'),
        array('regex_match' => 'Pole %s zawiera niedozwolone znaki')
      );
			$this->form_validation->set_rules('repass', 'Re-password',array(
        'trim',
        'matches[pass]'),
        array('regex_match' => 'Pole %s zawiera niedozwolone znaki',
              'matches'     => 'Hasła różnią się')
      );
			if($this->form_validation->run() == false){
				$register_data['register_errors'] = validation_errors();
        $data['content'] = $this->load->view('register', $register_data, true);
			} else {
				//register user
				try{
					$this->load->model('users');
					$this->users->new_user();
					$register_message = '
                  <div class="alert alert-success">
                    Zarejestrowałeś się poprawnie
                  </div>';
				} catch(Exception $e){
					$register_message = 'Wystąpił błąd: ' . $e->getMessage();
				} finally {
					$data['content'] = $register_message;
				}
			}
		} else {
			$data['content'] = $this->load->view('register', $register_data, true);
		}

		$this->load->view('template', $data);
	}
}
