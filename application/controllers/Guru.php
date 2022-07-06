<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/guru');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('guru', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('guru/index');
    }
    public function data_materi()
    {
        $this->load->model('m_guru');
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_guru->data_materi()->result();
        $this->load->view('guru/data_materi', $data);
    }
    public function add_materi()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[1]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/add_materi');
        } else {
            $upload_video = $_FILES['video'];

            if ($upload_video) {
                $config['allowed_types'] = 'mp4|docx|pdf';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/materi_video';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'video' => $video,
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];

            $this->db->insert('materi', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('guru'));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './assets/materi_video';
        $config['allowed_types'] = 'mp4|docx|pdf';
        $config['file_name'] = $this->product_id;
        $config['overwrite'] = true;
        $config['max_size'] = 0; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.mp4|docx|pdf";
    }
    public function delete_materi($id)
    {
        $this->load->model('m_guru');
        $where = array('id' => $id);
        $this->m_guru->delete_materi($where, 'materi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('guru/data_materi');
    }
    public function update_materi($id)
    {
        $this->load->model('m_guru');
        $where = array('id' => $id);
        $data['user'] = $this->m_guru->update_materi($where, 'materi')->result();
        $this->load->view('guru/update_materi', $data);
    }

    public function materi_edit()
    {
        $this->load->model('m_guru');

        $id = $this->input->post('id');
        $nama_guru = $this->input->post('nama_guru');
        $nama_mapel = $this->input->post('nama_mapel');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_guru' => $nama_guru,
            'nama_mapel' => $nama_mapel,
            'deskripsi' => $deskripsi,

        );

        $where = array(
            'id' => $id,
        );

        $this->m_guru->update_datamateri($where, $data, 'materi');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('guru/data_materi');
    }

    public function add_tugas()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[1]', [
            'required' => 'Harap isi kolom deskripsi.',
            'min_length' => 'deskripsi terlalu pendek.',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('guru/add_tugas');
        } else {
            $upload_video = $_FILES['video'];

            if ($upload_video) {
                $config['allowed_types'] = 'mp4|docx|pdf';
                $config['max_size'] = '0';
                $config['upload_path'] = './assets/materi_video';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [
                'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
                'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
                'video' => $video,
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'tanggal_buat' => htmlspecialchars($this->input->post('tanggal_buat', true)),
                'tanggal_kumpul' => htmlspecialchars($this->input->post('tanggal_kumpul', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            ];

            $this->db->insert('tugas', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('guru'));
        }
    }

    private function _uploadImage1()
    {
        $config['upload_path'] = './assets/materi_video';
        $config['allowed_types'] = 'mp4|docx|pdf';
        $config['file_name'] = $this->product_id;
        $config['overwrite'] = true;
        $config['max_size'] = 0; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.mp4|docx|pdf";
    }
    public function data_tugas()
    {
        $this->load->model('m_guru');
        $data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['user'] = $this->m_guru->data_tugas()->result();
        $this->load->view('guru/data_tugas', $data);
    }
    public function delete_tugas($id)
    {
        $this->load->model('m_guru');
        $where = array('id' => $id);
        $this->m_guru->delete_tugas($where, 'tugas');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('guru/data_tugas');
    }
    public function update_tugas($id)
    {
        $this->load->model('m_guru');
        $where = array('id' => $id);
        $data['user'] = $this->m_guru->update_tugas($where, 'tugas')->result();
        $this->load->view('guru/update_tugas', $data);
    }

    public function tugas_edit()
    {
        $this->load->model('m_guru');

        $id = $this->input->post('id');
        $nama_guru = $this->input->post('nama_guru');
        $nama_mapel = $this->input->post('nama_mapel');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_guru' => $nama_guru,
            'nama_mapel' => $nama_mapel,
            'deskripsi' => $deskripsi,

        );

        $where = array(
            'id' => $id,
        );

        $this->m_guru->update_datatugas($where, $data, 'tugas');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('guru/data_tugas');
    }

}