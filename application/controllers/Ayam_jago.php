<?php
class Ayam_jago extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } else if (!$this->ion_auth->in_group('Panitia') && !$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $this->load->library('user_agent');
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('form_validation', 'ion_auth');
        $this->load->helper('url');
        $this->load->model('AyamJago_model');
        $this->user = $this->ion_auth->user()->row();
        $this->form_validation->set_error_delimiters('', '');
    }
    public function index()
    {
        $data = [
            "user" => $this->user,
        ];
        $this->template->load('template/template', 'ayamJago/index', $data);
    }

    public function checkAyamJago() {
        
    }

    public function check(){
        $data = [
            "user" => $this->user,
        ];
        $this->template->load('template/template', 'ayamJago/next',$data);
    }
}
