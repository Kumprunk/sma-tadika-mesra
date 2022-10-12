<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function data_guru()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['guru_res'] = $this->Mguru->guru_res()->result_array();

        $data['title'] = 'Data Guru';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('guru/data_guru', $data);
        $this->load->view('temp/footer', $data);
    }

    public function guruAdd()
    {
        
    }
}
