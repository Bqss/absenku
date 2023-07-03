<?php
class AyamJago_model extends CI_Model
{
    public $table = 'siswa';
    public $pk = 'nis';

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
    public function getById($nis){
        $this->db->where($this->pk, $nis);
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

    function check_ayam_jago(){
    $this->db->select('aj.nis, t2.something,')
     ->from('siswa as aj')
     ->where('t1.id', $id)
     ->join('table2 as t2', 't1.id = t2.id', 'LEFT')
     ->get();
    }

}
