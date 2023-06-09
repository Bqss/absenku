<?php

class Hasil_cek_ayam_model extends CI_Model
{

    private $pk = "id_check";
    private $table = "hasil_check_ayam";
    private $order = "DESC";
    private $fk = [
        "ayam" => "id_ayam_jago",
        "kegiatan" => "id_kegiatan",
    ];

    public function __construct()
    {
        parent::__construct();
    }
    public function getAllHasilCek()
    {
        $this->db->order_by($this->pk, $this->order);
        return $this->db->get($this->table)->result();
    }

    public function checkIsExist($id_ayam_jago)
    {
        $this->db->where($this->fk["ayam"], $id_ayam_jago);
        $result = $this->db->get($this->table)->result();
        return count($result) > 0;
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function getById($id_ayam_jago){
        $this->db->where($this->fk["ayam"], $id_ayam_jago);
        $result = $this->db->get($this->table)->result();
        return $result;
    }
    public function delete($id)
    {  
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table);
    }   
}
