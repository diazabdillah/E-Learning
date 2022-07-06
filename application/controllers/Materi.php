<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function belajar($id)
    {
        $this->load->library('disqus');
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $detail = $this->m_materi->belajar($id);
        $data['detail'] = $detail;
        $data['disqus'] = $this->disqus->get_html();
        $this->load->view('materi/belajar', $data);
        $this->load->view('template/footer');
    }
    public function tugas($id)
    {
        $this->load->library('disqus');
        $this->load->model('m_materi');
        $where = array('id' => $id);
        $tambah = $this->m_materi->tugas($id);
        $data['tambah'] = $tambah;
        $data['disqus'] = $this->disqus->get_html();
        $this->load->view('materi/tugas', $data);
        $this->load->view('template/footer');
    }

    public function tambah_tugas()
    {

        if ($this->form_validation->run() == false) {
            $this->load->view('materi/tugas');
        } else {
            $upload_video = $_FILES['video'];

            if ($upload_video) {
                $config['allowed_types'] = 'png|jpg|docx|mp4|pdf';
                $config['max_size'] = 10000;
                $config['upload_path'] = './assets/materi_video';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('video')) {
                    $video = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
            }
            $data = [

                'video' => $video,

            ];

            $this->db->insert('kumpultugas', $data);
            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('materi/orkom/'));
        }
    }

    public function orkom()
    {
        $this->load->model('m_materi');
       
       $this->m_materi->orkom();
        $data['materiorkom'] = $this->m_materi->orkom()->result();
        $data['user'] = $this->db->get_where('siswa', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('materi/orkom',$data);
        $this->load->view('template/footer');
    }

    public function basisdata()
    {
        $this->load->model('m_materi');
        $data['materibasisdata'] = $this->m_materi->basisdata()->result();
        $data['user'] = $this->db->get_where('siswa', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('materi/basisdata', $data);
        $this->load->view('template/footer');
    }

}