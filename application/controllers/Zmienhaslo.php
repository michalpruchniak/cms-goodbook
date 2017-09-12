<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Zmienhaslo extends CI_Controller {

	public function index()
	{
		if(!$this->session->has_userdata('userID') ){
			header('Location: ' . base_url().'index.php/login');
		} else {
      $this->load->library('form_validation');
      $update_data=[];
      $this->load->model('users');
      $userID = $this->session->userdata('userID');
      $update_data['username'] = $this->users->checkUserRow($userID)->username;
      if(isset($_POST['oldpass'])){
        //set rules
        $this->form_validation->set_rules('oldpass', 'Oldpass', array(
          'trim',
          'required',
          'min_length[6]',
          'max_length[35]',
          'regex_match[/^[a-zA-Z0-9@\._-]{6,35}$/]',
          'callback_pass_check'),
          array('regex_match' => 'Pole %s zawiera niedozwolone znaki')
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
          $update_data['update_errors'] = validation_errors();
          $data['content'] = $this->load->view('user/userdata_update', $update_data, true);
        } else {
          //update user
          try{
            $this->load->model('users');
            $this->users->updatePass(
              $this->session->userdata('userID'),
              $_POST['pass']
            );
            $update_message = $this->load->view('alerts/success', array(
							'message' => 'Hasło zostało zmienione'
						));
          } catch(Exception $e){
            $update_message = 'Wystąpił błąd: ' . $e->getMessage();
          } finally {
            $data['content'] = $update_message;
          }
        }
      } else {
        $data['content'] = $this->load->view('user/userdata_update', $update_data, true);
      }

      $this->load->view('template', $data);
    }
	}
  function pass_check($str){
    $userID = $this->session->userdata('userID');
    $oldpass = $this->users->checkUserRow($userID)->pass;
    if(sha1($str) != $oldpass){
      $this->form_validation->set_message('pass_check', 'Stare hasło jest niepoprawne');
      return false;
    } else {
      return true;
    }
  }
}
