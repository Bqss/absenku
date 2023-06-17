<?php
class AyamCiawi extends CI_Controller
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
        $this->load->model('AyamJago_model', 'ayamJago');
        $this->user = $this->ion_auth->user()->row();
        $this->form_validation->set_error_delimiters('', '');
    }
    public function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }
    public function data()
    {
        $this->output_json($this->ayamJago->get_all(), true);
    }
    public function index()
    {
        $chek = $this->ion_auth->is_admin();
        $data = [
            "user" => $this->user,
            'result' => !$chek ? 0 : 1,
        ];
        $this->template->load('template/template', 'ayamCiawi/index', $data);
        $this->load->view('template/datatables');
    }
    public function create()
    {
        $chek = $this->ion_auth->is_admin();
        $data = [
            "user" => $this->user,
            'result' => !$chek ? 0 : 1,
        ];
        $this->template->load('template/template', 'ayamCiawi/create', $data);
    }

    public function createHandler()
    {
        $this->rules();
        if($this->form_validation->run() == false){
            return redirect(site_url('ayamCiawi/create'));
        }
        $data = [
            "nama" => $this->input->post('nama'),
            "TTL" => $this->input->post('TTL'),
            "usia" => $this->input->post('usia'),
            "weton" => $this->input->post('weton'),
            "jenis_latihan" => $this->input->post('jenis_latihan'),
            // "foto" => $this->input->post('foto'),
        ];
        $this->ayamJago->create($data);
        redirect(site_url("ayamCiawi"));
    }
    public function update($id_ayam_jago){
        $ayamJago = $this->ayamJago->getById($id_ayam_jago);
        $data = [
            "user" => $this->user,
            "ayamJago" => $ayamJago[0]
        ];
        $this->template->load('template/template', 'ayamCiawi/update', $data);
    }
    public function updateHandler($id_ayam_jago)
    {
        $this->rules();
        if($this->form_validation->run() == false){
            return redirect(site_url('ayamCiawi/update'));
        }
        $data = [
            "nama" => $this->input->post('nama'),
            "TTL" => $this->input->post('TTL'),
            "usia" => $this->input->post('usia'),
            "weton" => $this->input->post('weton'),
            "jenis_latihan" => $this->input->post('jenis_latihan'),
            // "foto" => $this->input->post('foto'),
        ];
        $this->ayamJago->update($id_ayam_jago, $data);
        redirect(site_url("ayamCiawi"));
    }
    public function detail($id_ayam_jago){
        $ayamJago = $this->ayamJago->getById($id_ayam_jago);
        $data = [
            "user" => $this->user,
            "ayamJago" => $ayamJago[0]
        ];
        $this->template->load('template/template', 'ayamCiawi/detail', $data);
    }
    public function delete($id_ayam_jago)
    {
        $this->ayamJago->delete($id_ayam_jago);
        redirect(site_url("ayamCiawi"));
    }
    public function rules(){
        $this-> form_validation->set_rules('nama', 'Nama', 'required');
        $this-> form_validation->set_rules('TTL', 'TTL', 'required');
        $this-> form_validation->set_rules('usia', 'Usia', 'required');
        $this-> form_validation->set_rules('weton', 'Weton', 'required');
        $this-> form_validation->set_rules('jenis_latihan', 'Jenis Latihan', 'required');
    }
}
