<?php 
    class Ayam_jago extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Users_model');
            $this->load->library('form_validation');
            $this->load->library('form_validation', 'ion_auth');
            $this->load->helper('url');
            $this->user = $this->ion_auth->user()->row();
            $this->form_validation->set_error_delimiters('', '');
        }
        public function index(){
            $data = [
                "user" => $this -> user,

            ];
            $this->template->load('template/template', 'ayamJago/index', $data);
            // $this->load->view('template/template');
            // $this->load->view('template/datatables');
            // $this->load->view("ayamJago/index");

        }
    }
