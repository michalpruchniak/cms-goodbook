<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Book extends CI_Controller {

  public function showBook($prefix){
    $this->load->model('books');
    $this->load->model('rate');
    $prefix = xss_clean($prefix);
    $bookID = $this->books->showBook($prefix)->bookID;

    $book = $this->books->showBook($prefix);
    if($this->session->has_userdata('userID') ){
        $user = $this->session->userdata('userID');
        if($this->rate->userRate($user, $bookID)){
          $book->stars = 'Twoja ocena to: ' . $this->rate->userRate($user, $bookID)->rate;
        } else {
          $book->stars = 'Możesz głosować' . $user;
        }
      } else {
        $book->stars = 'log in';
    }
    if($book){
      $data['content'] = $this->load->view('showbook', $book ,true);
    } else {
      $data['content'] = $this->load->view('alerts/errors', array(
        'message' => 'Nie znaleziono tej książki'
      ),true);
    }
    $this->load->view('template', $data);
  }

  public function page($genre = 'all', $page=0){
    $this->load->model('books');
    $page = xss_clean(intval($page));
    $genre = xss_clean($genre);
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
