<?php
class AyamJago_model extends CI_Model
{
    public $table = 'barcode';
    public $id = 'id_barcode';
    public $order = 'DESC';
    public $id_karyawan = 'id_karyawan';
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo "Ayam Jago";
    }
}
