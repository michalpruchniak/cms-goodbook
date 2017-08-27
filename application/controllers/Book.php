<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Book extends CI_Controller {

  public function page($page){
    $this->load->model('books');
    $books_data['books'] = $this->books->pageBooks($page, 10);
    $data['content'] = $this->load->view('all_books', $books_data, true);
    $this->load->view('template', $data);
  }

}
