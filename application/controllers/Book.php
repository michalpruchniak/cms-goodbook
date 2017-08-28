<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Book extends CI_Controller {

  public function page($page=0){
    $this->load->model('books');
    $countBooks = $this->books->countBooks();
    if($page%20==0 && $page < $countBooks){
      $books_data['books'] = $this->books->pageBooks(20, $page);
      $data['content'] = $this->load->view('all_books', $books_data, true);
    } else {
      $data['content'] = 'Wystąpił błąd';
    }
    $this->load->view('template', $data);
  }

}
