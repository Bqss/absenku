<?php 

    class CekAyamCiawi extends CI_Controller{

        public function __construct () {
            parent::__construct();
            $this->load->library('user_agent');
            $this->load->model('Users_model');
            $this->load->library('form_validation');
            $this->load->library('form_validation', 'ion_auth');
            $this->load->helper('url');
            $this->load->model('AyamJago_model', 'ayamJago');
            $this->load->model("Hasil_cek_ayam_model",'hasilCekAyam');
            $this->user = $this->ion_auth->user()->row();
            $this->form_validation->set_error_delimiters('', '');
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
        public function index()
        {
            $data = [
                "user" => $this->user,
            ];
            $this->template->load('template/template', 'checkAyamCiawi/index', $data);
        }
    
        public function check() {
            $id_ayam_jago = $this->input->post("id_ayam_jago");
            if(!$this->hasilCekAyam->checkIsExist($id_ayam_jago)){
                return redirect(site_url('cekAyamCiawi/create/'.$id_ayam_jago));
            }
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'berhasil cek'));
            return redirect('/cekAyamCiawi');

        }
    
        public function create($id_ayam_jago){
            
            $dataayamjago  = $this -> ayamJago-> getById($id_ayam_jago);
            if(count($dataayamjago) == 0){
                $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'id salah'));
                return redirect('/cekAyamCiawi');
            }
            $dataayamjago = $dataayamjago[0];
            $data = [
                "user" => $this->user,
                "ayamJago" => [
                    "id_ayam_jago" => $id_ayam_jago,
                    "nama" => $dataayamjago->nama,
                    "tgl_lahir" => $dataayamjago->tgl_lahir,
                    "weton" => $dataayamjago->weton,
                    "usia" => $dataayamjago->usia,
                    "jenis_latihan" => $dataayamjago->jenis_latihan,
                    "foto" => $dataayamjago->foto,
                ],
            ];

            $this->template->load('template/template', 'checkAyamCiawi/create',$data);
        }

        public function handleCreate(){
            $id_ayam_jago = $this->input->post("id_ayam_jago");
            $keterangan = $this->input->post("isLulus") ;
            $alasan = $this->input->post("alasan");

            $this->hasilCekAyam->create([
                "id_ayam_jago" => $id_ayam_jago,
                "keterangan" => $keterangan,
                "alasan" => $alasan,
            ]);

            $this->session->set_flashData('messageAlert', $this->messageAlert('success',"berhasil membuat penilaian"));
            return redirect("/cekAyamCiawi");
        }
    }
