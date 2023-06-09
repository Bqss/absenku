<?php
class AyamJago_model extends CI_Model
{
    public $table = 'ayam_jago';
    public $id = 'id_ayam_jago';
    public $order = 'DESC';
    public function __construct()
    {
        parent::__construct();
    }
    function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

    function get_by_no_induk($id)
    {
        $sql = "SELECT * from ayam_jago where nis=$id ";
        return $this->db->query($sql)->row($id);
    }

    function check_ayam_jago(){
    $this->db->select('aj.id_ayam_jago, t2.something,')
     ->from('ayam_jago as aj')
     ->where('t1.id', $id)
     ->join('table2 as t2', 't1.id = t2.id', 'LEFT')
     ->get();
    }

}
