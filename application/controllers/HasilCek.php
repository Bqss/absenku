<?php

class HasilCek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('form_validation', 'ion_auth');
        $this->load->helper('url');
        $this->load->model('AyamJago_model', 'ayamJago');
        $this->load->model("Hasil_cek_ayam_model", 'hasilCekAyam');
        $this->user = $this->ion_auth->user()->row();
        $this->form_validation->set_error_delimiters('', '');
    }
    public function index()
    {
        $chek = $this->ion_auth->is_admin();
        $data = [
            "user" => $this->user,
            'result' => !$chek ? 0 : 1,
        ];
        $this->template->load('template/template', 'hasilCek/index', $data);
        $this->load->view('template/datatables');
    }
    public function messageAlert($type, $title)
    {
        $messageAlert = "const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    type: '" . $type . "',
                    title: '" . $title . "'
                });";
        return $messageAlert;
    }

    public function delete($id)
    {
        $this->hasilCekAyam->delete($id);
        redirect(site_url('hasilCek'));
    }
    public function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }
    public function data()
    {
        $this->output_json($this->hasilCekAyam->getAllHasilCek(), true);
    }
}
