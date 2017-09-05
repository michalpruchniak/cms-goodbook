<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller {
  public function index(){
    if(!isset($_POST['search']) || strlen($_POST['search']) < 1){
      $search_error['message'] = 'Brak wyników wyszukiwania';
      $data['content'] = $this->load->view('alerts/errors', $search_error, true);
    } else {
      $search_tag = xss_clean($_POST['search']);
      $this->load->model('books');
      $books_data['books'] = $this->books->showAllResults($search_tag);
      $data['content'] = $this->load->view('all_books', $books_data, true);
    }
    $this->load->view('template', $data);
  }
}
