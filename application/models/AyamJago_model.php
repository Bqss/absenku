<?php
class AyamJago_model extends CI_Model
{
    public $table = 'ayam_jago';
    public $pk = 'id_ayam_jago';

    public $order = 'DESC';
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_all()
    {
        $this->db->order_by($this->pk, $this->order);
        return $this->db->get($this->table)->result();
    }
    public function getById($id_ayam){
        $this->db->where($this->pk, $id_ayam);
        return $this->db->get($this->table)->result();
    }
    public function delete($id){
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table);
    }
    public function create($data){
        $this->db->insert($this->table, $data);
    }
    public function update($id, $data){
        $this->db->where($this->pk, $id);
        $this->db->update($this->table, $data);
    }
}
