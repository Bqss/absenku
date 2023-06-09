<?php
class AyamJago_model extends CI_Model
{
    public $table = 'ayam_jago';
<<<<<<< HEAD
    public $id = 'id_ayam_jago';
=======
    public $pk = 'id_ayam_jago';

>>>>>>> ebc73afc8a5aa0f6e662a55235a74b691a886528
    public $order = 'DESC';
    public function __construct()
    {
        parent::__construct();
    }
<<<<<<< HEAD
    function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

    function get_by_no_induk($id)
    {
        $sql = "SELECT * from ayam_jago where nis=$id ";
        return $this->db->query($sql)->row($id);
=======
    
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
>>>>>>> ebc73afc8a5aa0f6e662a55235a74b691a886528
    }

    function check_ayam_jago(){
    $this->db->select('aj.id_ayam_jago, t2.something,')
     ->from('ayam_jago as aj')
     ->where('t1.id', $id)
     ->join('table2 as t2', 't1.id = t2.id', 'LEFT')
     ->get();
    }

}
