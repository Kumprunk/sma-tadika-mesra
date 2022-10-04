<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function data_mapel()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['mapel_res'] = $this->db->get('b_mapel')->result_array();

        $data['title'] = 'Mata Pelajaran';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('mapel/data_mapel', $data);
        $this->load->view('temp/footer', $data);
    }
}
