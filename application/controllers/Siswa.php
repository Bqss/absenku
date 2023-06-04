<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Siswa extends CI_Controller
{

  function __construct()
  {

    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('auth');
    }

    $this->load->library('user_agent');
    $this->load->model(array('Siswa_model'));
    $this->load->library('form_validation', 'ion_auth');
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
    $siswa = $this->Siswa_model->get_all_query();
    $data = array(
      'siswa_data' => $siswa,
      'user' => $user,
      'users'     => $this->ion_auth->user()->row(),
      'result' => $hasil,
    );
    $this->template->load('template/template', 'siswa/siswa_list', $data);
    $this->load->view('template/datatables');
  }

  public function output_json($data, $encode = true)
  {
    if ($encode) $data = json_encode($data);
    $this->output->set_content_type('application/json')->set_output($data);
  }


  public function data()
  {
    $this->output_json($this->Siswa_model->getData(), true);
  }

  public function rd($id)
  {
    // dd($id);
    $user = $this->user;
    $row = $this->Siswa_model->get_by_id_query($id);
    if ($row) {
      $uri = $this->uri->segment(3);
      $data = array(
        'nis' => $row->nis,
        'nama' => $row->nama,
        'ranting' => $row->ranting,
        'rayon' => $row->rayon,
        'agama' => $row->agama,
        'alamat' => $row->alamat,
        'jk' => $row->jk,
        'tempat_lahir' => $row->tempat_lahir,
        'pasaran' => $row->pasaran,
        'tgl_lahir' => $row->tgl_lahir,
        'user' => $user,
        'users'  => $this->ion_auth->user()->row(),

      );
      $this->template->load('template/template', 'siswa/siswa_read', $data, $uri);
    } else {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Data tidak ditemukan!'));
      redirect(site_url('siswa'));
    }
  }

  public function create()
  {
    $chek = $this->ion_auth->is_admin();
    if (!$chek) {
      show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Dilarang!');
      $hasil = 0;
    } else {
      $hasil = 1;
    }
    $user = $this->user;
    $data = array(
      'box' => 'info',
      'button' => 'Create',
      'action' => site_url('siswa/create_action'),
      'id_karyawan' => set_value('id_karyawan'),
      'nama_karyawan' => set_value('nama_karyawan'),
      'jabatan' => set_value('jabatan'),
      'id_shift' => set_value('id_shift'),
      'gedung_id' => set_value('gedung_id'),
      'id' => set_value('id'),
      'user' => $user, 'users'     => $this->ion_auth->user()->row(),
      'result' => $hasil,
    );
    $this->template->load('template/template', 'siswa/siswa_form_create', $data);
  }
  public function create_action()
  {
    // $this->_rules();
    // if ($this->form_validation->run() == FALSE) {
    //     $this->create();
    // } else {


    // $kode = $this->Jabatan_model->get_by_id($this->input->post('jabatan'));
    // $kodejbt = $kode->nama_jabatan;
    // $kodeagt = substr($kodejbt, 0, 1);
    // $tgl = date('ym');
    // $var = $this->Siswa_model->get_max();
    // $getvar = $var[0]->kode;
    // $nilai = $this->formatNbr($var[0]->kode);
    // $nourut = $kodeagt . $tgl . $nilai;
    $data = array(
      'nis' => $this->input->post('nis'),
      'nama' => $this->input->post('nama'),
      'ranting' => $this->input->post('ranting'),
      'rayon' => $this->input->post('rayon'),
      'jk' => $this->input->post('jenis_kelamin'),
      'agama' => $this->input->post('agama'),
      'alamat' => $this->input->post('alamat'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tgl_lahir' => $this->input->post('tanggal_lahir'),
      'pasaran' => $this->input->post('pasaran'),

    );
    // dd($data);
    $this->Siswa_model->insert($data);
    $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambahkan siswa'));
    redirect(site_url('siswa'));
    // }
  }

  public function search()
  {
    $chek = $this->ion_auth->is_admin();
    $hasil = $chek ? 1 : 0;
    $user = $this->user;
    $data = array(
      'box' => 'info',
      'button' => 'Search',
      'action' => site_url('siswa/search_action'),
      'user' => $user, 'users'     => $this->ion_auth->user()->row(),
      'result' => $hasil,
    );
    $this->template->load('template/template', 'siswa/search', $data);
  }
  public function search_action()
  {
    $user = $this->user;
    $nis = $this->input->post('nis', TRUE);
    $row = $this->Siswa_model->get_by_no_induk($nis);
    if ($row) {
      // $uri = $noinduk;
      $data = array(
        'nis' => $row->nis,
        'nama' => $row->nama,
        'ranting' => $row->ranting,
        'rayon' => $row->rayon,
        'agama' => $row->agama,
        'alamat' => $row->alamat,
        // 'kelas' => $row->kelas,
        'jk' => $row->jk,
        'tempat_lahir' => $row->tempat_lahir,
        'pasaran' => $row->pasaran,
        'tgl_lahir' => $row->tgl_lahir,
        'user' => $user, 'users'     => $this->ion_auth->user()->row(),
      );
      $this->template->load('template/template', 'siswa/read', $data);
    } else {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Data tidak ditemukan!'));
      redirect(site_url('siswa'));
    }
  }

  function formatNbr($nbr)
  {
    if ($nbr == 0)
      return "001";
    else if ($nbr < 10)
      return "00" . $nbr;
    elseif ($nbr >= 10 && $nbr < 100)
      return "0" . $nbr;
    else
      return strval($nbr);
  }


  public function update($id)
  {
    if (!$this->ion_auth->is_admin()) {
      return show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Dilarang!');
    }
    $user = $this->user;
    $row = $this->Siswa_model->get_by_id_query($id);
    if ($row) {
      $data = array(
        'box' => 'danger',
        'button' => 'Update',
        'action' => site_url('siswa/update_action'),
        'nama' => set_value('nama', $row->nama),
        'nis' => set_value('no_induk', $row->nis),
        'ranting' => set_value('ranting', $row->ranting),
        'rayon' => set_value('rayon', $row->rayon),
        'jk' => set_value('jk', $row->jk),
        'agama' => set_value('agama', $row->agama),
        'alamat' => set_value('alamat', $row->alamat),
        'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
        'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
        'pasaran' => set_value('pasaran', $row->pasaran),
        'user' => $user,
        'users'     => $this->ion_auth->user()->row(),

      );
      $this->template->load('template/template', 'siswa/siswa_form', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('siswa'));
    }
  }

  public function update_action()
  {
    if (!$this->ion_auth->is_admin()) {
      show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Dilarang!');
    }
    // $kodelama = substr($id_karyawan, 0, 1);
    // $kodebaru = substr($kodejbt, 0, 1);
    // $updatekode = str_replace($kodelama, $kodebaru, $id_karyawan);
    $data = array(

      'nama' => $this->input->post('nama'),
      'ranting' => $this->input->post('ranting'),
      'rayon' => $this->input->post('rayon'),
      'jk' => $this->input->post('jk'),
      'agama' => $this->input->post('agama'),
      'alamat' => $this->input->post('alamat'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'pasaran' => $this->input->post('pasaran'),
    );

    // dd($data);

    $this->Siswa_model->update($this->input->post('nis'), $data);
    $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data siswa'));
    redirect(site_url('siswa'));
  }

  public function delete($id)
  {
    if (!$this->ion_auth->is_admin()) {
      show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Dilarang!');
    }
    $row = $this->Siswa_model->get_by_id_query($id);
    if ($row) {
      $this->Siswa_model->delete($id);
      $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menghapus data karyawan'));
      redirect(site_url('siswa'));
    } else {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('danger', 'data tidak ditemukan'));
      redirect(site_url('siswa'));
    }
  }


  public function _rules()
  {
    $this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
    $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
    $this->form_validation->set_rules('id_shift', 'id_shift', 'trim|required');
    $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  function _set_useragent()
  {
    if ($this->agent->is_mobile('iphone')) {
      $this->agent = 'iphone';
    } elseif ($this->agent->is_mobile()) {
      $this->agent = 'mobile';
    } else {
      $this->agent = 'desktop';
    }
  }
}
