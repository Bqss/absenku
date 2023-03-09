<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public $table = 'siswa';
    public $id = 'id_siswa';
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
            ->from('siswa')->get()->result();
    }

    function get_all_query()
    {
        $sql = "SELECT *
                from siswa";
        return $this->db->query($sql)->result();
    }


    function get_by_id_query($id)
    {
        $sql = "SELECT *
        from siswa 
        where id_siswa=$id";
        return $this->db->query($sql)->row($id);
    }

    function get_by_no_induk($id)
    {
        $sql = "SELECT *
        from siswa 
        where no_induk=$id";
        return $this->db->query($sql)->row($id);
    }


    function getData()
    {
        $this->datatables->select('*')
            ->from('siswa');
        return $this->datatables->generate();
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
