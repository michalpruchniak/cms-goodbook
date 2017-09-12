<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class  Newbook extends CI_Controller {


  public function index(){
    $this->load->library('form_validation');
    $newbookr_data=[];
    if(!$this->session->has_userdata('userID') || $this->session->userdata('admin') != true){
      header('Location: ' . base_url().'index.php/login');
    } else {
      $data['content'] = $this->load->view('admin/newbook', '', true);

      if(isset($_POST['title'])){
        $this->form_validation->set_rules('title', 'Title', array(
          'trim',
          'required',
          'min_length[2]',
          'max_length[100]'
        ));
        $this->form_validation->set_rules('author', 'Author', array(
          'trim',
          'required',
          'min_length[2]',
          'max_length[100]'
        ));
        $this->form_validation->set_rules('genre', 'Genre', array(
          'trim',
          'required',
          'min_length[2]',
          'max_length[50]'
        ));

        $this->form_validation->set_rules('year', 'Year', array(
          'trim',
          'required',
          'greater_than[1000]',
          'less_than_equal_to[' .date("Y"). ']'
        ));
        $this->form_validation->set_rules('describe', 'Describe', array(
          'trim',
          'required',
          'min_length[50]'
        ));
        $this->form_validation->set_rules('prefix', 'Prefix', array(
          'trim',
          'required',
          'is_unique[books.prefix]',
          'min_length[2]',
          'max_length[50]',
          'regex_match[/^[a-z0-9\-\+]{2,30}$/]'
        ));

        $file_name = rand(1000, 9999). '-' .date("d-m-Y");

        $config_upload = [
          'upload_path'   => './upload/',
          'allowed_types' => 'gif|jpg|png',
          'max_size'      => 1000,
          'file_name'     => $file_name . '.png'
        ];

        $this->load->library('upload', $config_upload);

        $flag = true;
        $errors['message'] = '';
        if($this->form_validation->run() == FALSE){
          $flag = false;
          $errors['message'] .= validation_errors();
        }
        if($flag==true && !$this->upload->do_upload('coverimg')){
          $flag = false;
          $errors['message'] .= $this->upload->display_errors();
        }

        if($flag == false ){
          $newbook_data['newbook_errors'] = $this->load->view("alerts/errors", $errors, true);
          $data['content'] = $this->load->view('admin/newbook', $newbook_data, true);
        } else {
          try{
            $order_array = array(
            'bookID' => NULL,
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'genre' => $this->input->post('genre'),
            'year' => $this->input->post('year'),
            'describebook' => $this->input->post('describe'),
            'prefix' => $this->input->post('prefix'),
            'cover' => $file_name

            );
            $this->load->model('addbook');
            $this->addbook->addNewBook($order_array);
            $addbook = $this->load->view('alerts/success', array(
            'message' => 'Książka została poprawnie dodana do naszej bazy danych'
            ), true);
          } catch(Exception $e){
            $addbook = 'Wystąpił błąd: ' . $e->getMessage();
          } finally {
            $data['content'] = $addbook;
          }
        }

      }
      $this->load->view('template', $data);
    }
  }

    }
?>
