<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Book extends CI_Controller {

  public function page($genre = 'all', $page=0){
    $this->load->model('books');
    $page = intval($page);
    $countBooks = $this->books->countBooks($genre);
    if($page%20==0 && $page < $countBooks ){
      $books_data['books'] = $this->books->pageBooks(20, $page, $genre);
      $books_data['genre'] = $genre;
      $data['content'] = $this->load->view('all_books', $books_data, true);
    } else {

      $data['content'] = $this->load->view('alerts/errors', array(
        'message' => 'Brak elementów do wyświetlenia'
      ),true);
    }
    $this->load->view('template', $data);
  }

}
