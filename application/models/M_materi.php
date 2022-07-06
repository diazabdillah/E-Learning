<?php

class M_materi extends CI_Model
{
    //management materi
    public function tampil_data()
    {
        return $this->db->get('materi');
    }
    public function belajar($id)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
    }
    public function detail_materi($id = null)
    {
        $query = $this->db->get_where('materi', array('id' => $id))->row();
        return $query;
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
    //management tugas
    public function tugas($id = null)
    {
        $query = $this->db->get_where('tugas', array('id' => $id))->row();
        return $query;
    }
    public function tampil_tugas()
    {
        return $this->db->get('tugas');
    }
    public function detail_tugas($id = null)
    {
        $query = $this->db->get_where('tugas', array('id' => $id))->row();
        return $query;
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

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function orkom()
    {
        $nama_mapel= 'orkom';
        $this->db->where('nama_mapel', $nama_mapel);  
       return $this->db->get('materi');          
    }
    public function basisdata()
    {

        $nama_mapel= 'basisdata';
        $this->db->where('nama_mapel', $nama_mapel);  
       return $this->db->get('materi');
    }

    
}