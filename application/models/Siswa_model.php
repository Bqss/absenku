<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

    public $table = 'siswa';
    // public $id = 'id_siswa';
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
        $sql = "SELECT * from siswa 
        where nis=$id";
        return $this->db->query($sql)->row($id);
    }

    function get_by_no_induk($id)
    {
        $sql = "SELECT * from siswa where nis=$id ";
        return $this->db->query($sql)->row($id);
    }


    function getData()
    {
        // $this->datatables->select('*')
        //     ->from('siswa');
        // return $this->datatables->generate();
        $result =   $this->db->query("select * from siswa") -> result();
        return $result;
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
      // dd($id);
      $this->db->where('nis', $id);
      $this->db->update($this->table, $data);
        // $this->db->update($this->table, $data, "nis=$id");
    }

    // delete data
    function delete($id)
    {
        $this->db->where('nis', $id);
        $this->db->delete($this->table);
    }
}
