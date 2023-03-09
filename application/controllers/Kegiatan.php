<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Kegiatan_model');
        $this->load->library('form_validation');
        $this->user = $this->ion_auth->user()->row();
    }

    public function messageAlert($type, $title)
    {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });

        Toast.fire({
            type: '" . $type . "',
            title: '" . $title . "'
        });
        ";
        return $messageAlert;
    }

    public function index()
    {
        $chek = $this->ion_auth->is_admin();

        if (!$chek) {
            $hasil = 0;
        } else {
            $hasil = 1;
        }
        $user = $this->user;
        $kegiatan = $this->Kegiatan_model->get_all();

        $data = array(
            'kegiatan_data' => $kegiatan,
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),
            'result' => $hasil,

        );
        $this->template->load('template/template', 'kegiatan/kegiatan_list', $data);
        $this->load->view('template/datatables');
    }


    public function rd($id)
    {
        $user = $this->user;
        $kegiatan = $this->Kegiatan_model->get_by_id($id);

        $data = array(
            'kegiatan_data' => $kegiatan,
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),

        );
        $this->template->load('template/template', 'kegiatan/kegiatan_read', $data);
        $this->load->view('template/datatables');
    }

    public function read($id)
    {

        $user = $this->user;
        $kegiatan = $this->Kegiatan_model->get_by_id($id);
        $data = array(
            'kegiatan_data' => $kegiatan,
            'user' => $user,
            'users'     => $this->ion_auth->user()->row(),
        );
        $this->template->load('template/template', 'kegiatan/kegiatan_read', $data);
    }

    public function create()
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $data = array(
            'box' => 'info',
            'button' => 'Create',
            'action' => site_url('kegiatan/create_action'),
            'id_kegiatan' => set_value('id_kegiatan'),
            'kegiatan' => set_value('kegiatan'),
            'lokasi' => set_value('lokasi'),
            'tgl' => set_value('tgl'),
            'aktif' => set_value('aktif'),
            'user' => $user, 
            'users'=> $this->ion_auth->user()->row(), 

        );
        $this->template->load('template/template', 'kegiatan/kegiatan_form', $data);
    }

    public function create_action()
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kegiatan' => $this->input->post('kegiatan', TRUE),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );
            $this->Kegiatan_model->insert($data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambahkan kegiatan'));
            redirect(site_url('kegiatan'));
        }
    }

    public function update($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $user = $this->user;
        $row = $this->Kegiatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'box' => 'warning',
                'button' => 'Update',
                'action' => site_url('kegiatan/update_action'),
                'id_kegiatan' => set_value('id_kegiatan', $row->id_kegiatan),
                'kegiatan' => set_value('kegiatan', $row->kegiatan),
                'lokasi' => set_value('lokasi', $row->lokasi),
                'tgl' => set_value('tgl', $row->tgl),
                'aktif' => set_value('aktif', $row->aktif),
                'user' => $user,
                'users'     => $this->ion_auth->user()->row(),
            );
            $this->template->load('template/template', 'kegiatan/kegiatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kegiatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kegiatan', TRUE));
        } else {
            $data = array(
                'kegiatan' => strtoupper($this->input->post('kegiatan', TRUE)),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
                'aktif' => $this->input->post('aktif', TRUE),
            );
            $this->Kegiatan_model->update($this->input->post('id_kegiatan', TRUE), $data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data kegiatan'));
            redirect(site_url('kegiatan'));
        }
    }

    public function delete($id)
    {
        if (!$this->ion_auth->is_admin()) {
            show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
        }
        $row = $this->Kegiatan_model->get_by_id($id);

        if ($row) {
            $this->Kegiatan_model->delete($id);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menghapus data kegiatan'));
            redirect(site_url('kegiatan'));
        } else {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('danger', 'data kegiatan tidak ditemukan'));
            redirect(site_url('kegiatan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('aktif', 'aktif', 'trim|required');
        $this->form_validation->set_rules('id_kegiatan', 'id_kegiatan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
