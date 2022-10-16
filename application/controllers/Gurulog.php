<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gurulog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();    
    }
    

    public function profil()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['guru']    = $this->Mgurulog->guru($data['userLog']['username'])->row_array();

        // print_r($data['userLog']['username']);
        $data['title'] = 'Profil';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('gurulog/profil', $data);
        $this->load->view('temp/footer', $data);
    }
}