<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Book extends CI_Controller {

  private function starRating($bookID){
    $this->load->model('rate');
      $this->load->model('books');
      //zalogowany
    if($this->session->has_userdata('userID') ){
      $user = $this->session->userdata('userID');
      if($this->rate->userRate($user, $bookID)){
          //głosował
          $stars['log'] = 3;
          if(isset($_POST['star']) && $_POST['star'] >= 1 && $_POST['star'] <= 5){
            //zapisz głos
            $this->rate->saveVote($this->session->userdata('userID'), $bookID, $_POST['star']);
          }
          $stars['checked'] = $this->rate->userRate($user, $bookID)->rate;
          return $this->load->view('stars', $stars, true);
      } else {
              // zalogowany, ale nie głosował
              $stars['log'] = 2;
              if(isset($_POST['star'])){
                $this->rate->saveVote($this->session->userdata('userID'), $bookID, $_POST['star']);
                $stars['log']=3;
                $stars['checked'] = $_POST['star'];
              }
              return $this->load->view('stars', $stars, true);
      }

      } else {
            //niezalogowany
            $stars['log'] = 1;
            return $this->load->view('stars', $stars, true);
      }

  }

  public function showBook($prefix){
    $this->load->model('books');
    $this->load->model('rate');
    $prefix = xss_clean($prefix);

    if($this->books->showBook($prefix)){
      $bookID = $this->books->showBook($prefix)->bookID;
      $book = $this->books->showBook($prefix);
      $book->stars = $this->starRating($bookID);
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

  public function index(){
      $data['content'] = $this->load->view('alerts/errors', array(
        'message' => "Nie wybrano żadnej książki do wyświetlenia"
      ), true);
      $this->load->view('template', $data);
  }
}
