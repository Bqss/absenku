<?php

class Scan_model extends Ci_Model
{
    public function cek_id($no_induk)
    {
        $query_str =$this->db->query("select * from siswa where nis=$no_induk")->result();
        dd($query_str);
        if (count($query_str) > 0) {
            return $query_str->row();
        } else {
            return false;
        }
    }

    public function absen_masuk($data)
    {
        return $this->db->insert('presensi_siswa', $data);
    }

    public function cek_kehadiran($no_induk, $tgl)
    {

      // no_induk changed to nis 
      // dd("select * from presensi_siswa where nis='$no_induk' and tgl='$tgl'");
        $query = $this->db->query("select * from presensi_siswa where nis='$no_induk' and tgl='$tgl'");
            // $this->db->where('nis', $no_induk)
            // ->where('tgl', $tgl)->get('presensi_siswa');
     
        if (count($query -> result()) >= 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function absen_pulang($no_induk, $data)
    {
        $tgl = date('Y-m-d');
        return $this->db->where('nis', $no_induk)
            ->where('tgl', $tgl)
            ->update('presensi_siswa', $data);
    }
}
