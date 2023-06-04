<?php

class Scan extends Ci_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('auth');
    } else if (!$this->ion_auth->in_group('Operator') && !$this->ion_auth->is_admin()) {
      show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
    }
    $this->load->library('user_agent');
    $this->load->helper('debug');
    $this->load->model('Gedung_model');
    $this->load->library('form_validation');
    $this->user = $this->ion_auth->user()->row();
    $this->load->model('Scan_model', 'Scan');
    $this->load->model('Kegiatan_model', 'Kegiatan');
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

  function index()
  {
    $user = $this->user;
    $kegiatan = $this->Kegiatan->getDataAktif();
    // dd( $this->session->userdata("prev_kegiatan"));

    $data = array(
      'kegiatan' => $kegiatan, 
      'user' => $user,
      'action' => site_url('scan/input_manual'),
      'users' => $this->ion_auth->user()->row(),
      "prev_kegiatan" => $this->session->flashdata("prev_kegiatan"),
    );
    if ($this->agent->is_mobile('iphone')) {
      $this->template->load('scan/template_sc', 'scan/scan_mobile', $data);
    } elseif ($this->agent->is_mobile()) {
      $this->template->load('scan/template_sc', 'scan/scan_mobile', $data);
    } else {
      $this->template->load('scan/template_sc', 'scan/scan_desktop', $data);
    }
  }



  function cek_id()
  {
    $user = $this->user;
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $result_code = $this->input->post('no_induk');
    $tgl = date('Y-m-d');
    $jam_msk = date('H:i:s');
    $jam_klr = date('H:i:s');
    $cek_id = $this->Scan->cek_id($result_code);
    $cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);
    $this->session->set_flashdata("prev_kegiatan",$jenis_kegiatan);
    if (!$cek_id) {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
      redirect($_SERVER['HTTP_REFERER']);
    } /*elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar != '00:00:00' && $cek_kehadiran->ket == 'pulang') {
			$data = array(
				'jam_keluar' => $jam_klr,
				'ket' => 'pulang',
			);
			$this->Scan->absen_pulang($result_code, $data);
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', $result_code.'absen pulang'));
			redirect($_SERVER['HTTP_REFERER']);
      // || $cek_kehadiran->jam_masuk != '00:00:00' || $cek_kehadiran->jam_keluar != '00:00:00' && $cek_kehadiran->ket == 'pulang'
      || $cek_kehadiran->jam_masuk != '00:00:00' || $cek_kehadiran->jam_keluar != '00:00:00' && $cek_kehadiran->ket == 'pulang' 
		} */ elseif ($cek_kehadiran  ) {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('warning', $result_code . ' sudah absen'));
      redirect($_SERVER['HTTP_REFERER']);
      return false;
    } else {
      $data = array(
        'nis' => $result_code,
        'tgl' => $tgl,
        'jam_msk' => $jam_msk,
        'id_kegiatan' => $jenis_kegiatan,
        'ket' => 'masuk',
        'operator' => $this->ion_auth->user()->row()->id,
      );
      $this->Scan->absen_masuk($data);
      $this->session->set_flashdata('messageAlert', $this->messageAlert('success', $result_code . ' absen masuk'));
      redirect($_SERVER['HTTP_REFERER']);
    }
  }



  function input_manual()
  {
    $user = $this->user;
    $jenis_kegiatan = $this->input->post('jenis_kegiatan');
    $result_code = $this->input->post('qrcode');
    $tgl = date('Y-m-d');
    $jam_msk = date('H:i:s');
    // $jam_klr = date('H:i:s');
    $cek_id = $this->Scan->cek_id($result_code);
    $cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);
    if (!$cek_id) {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
      redirect($_SERVER['HTTP_REFERER']);
    } /*elseif ($cek_kehadiran && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar != '00:00:00' && $cek_kehadiran->ket == 'pulang') {
			$data = array(
				'jam_keluar' => $jam_klr,
				'ket' => 'pulang',
			);
			$this->Scan->absen_pulang($result_code, $data);
			$this->session->set_flashdata('messageAlert', $this->messageAlert('success', $result_code.'absen pulang'));
			redirect($_SERVER['HTTP_REFERER']);
      // && $cek_kehadiran->jam_masuk != '00:00:00' && $cek_kehadiran->jam_keluar == '00:00:00' && $cek_kehadiran->ket != 'pulang'
		} */ elseif ($cek_kehadiran ) {
      $this->session->set_flashdata('messageAlert', $this->messageAlert('warning', $result_code . ' sudah absen'));
      redirect($_SERVER['HTTP_REFERER']);
      return false;
    } else {
      $data = array(
        'nis' => $result_code,
        'tgl' => $tgl,
        'jam_msk' => $jam_msk,
        'id_kegiatan' => $jenis_kegiatan,
        'ket' => 'masuk',
        'operator' => $this->ion_auth->user()->row()->id,
      );
      $this->Scan->absen_masuk($data);
      $this->session->set_flashdata('messageAlert', $this->messageAlert('success', $result_code . ' absen masuk'));
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
}
