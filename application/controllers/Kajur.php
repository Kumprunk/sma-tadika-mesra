<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kajur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function data_kajur()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['kelas_res'] = $this->db->get('b_kelas')->result_array();
        $data['jurusan_res'] = $this->db->get('b_jurusan')->result_array();

        $data['title'] = 'Data Kelas & Jurusan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('kajur/data_kajur', $data);
        $this->load->view('temp/footer', $data);
    }
}
