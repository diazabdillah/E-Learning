<?php

class M_guru extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('guru');
    }

    public function detail_guru($nip = null)
    {
        $query = $this->db->get_where('guru', array('nip' => $nip))->row();
        return $query;
    }

    public function delete_guru($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_guru($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function data_materi()
    {
        $nama_mapel= 'orkom';
        $this->db->where('nama_mapel', $nama_mapel);  
       return $this->db->get('materi'); 
    }
    public function delete_materi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_materi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_datamateri($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function data_tugas()
    {
        $nama_mapel=0;
        $this->db->where('nama_mapel', $nama_mapel);  
       return $this->db->get('tugas'); 
    }
    public function delete_tugas($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_tugas($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_datatugas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
 
}