<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends CI_Controller {

	public function showResults($title=false){
		$title=str_replace("-+_-", " ", $title);
    $this->load->model('search');
		if($title!=false && strlen($title)>2){
			$data['element'] = $this->search->showResults($title);
			$this->load->view('prompt', $data);

		}
  }
}
