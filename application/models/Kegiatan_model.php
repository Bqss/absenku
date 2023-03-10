<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{

    public $table = 'kegiatan';
    public $id = 'id_kegiatan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    function get_max()
    {
        return $this->db->select('max(id) as kode')
            ->from('kegiatan')->get()->result();
    }

    function get_all_query()
    {
        $sql = "SELECT *
                from kegiatan";
        return $this->db->query($sql)->result();
    }

    function getData()
    {
        $this->datatables->select('*')
            ->from('kegiatan');
        return $this->datatables->generate();
    }
    
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function getDataAktif()
    {
        $sql = "SELECT *
        from kegiatan WHERE aktif=1";
        return $this->db->query($sql)->result();
    }
  

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
