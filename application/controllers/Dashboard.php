<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['jumlah_siswa'] = $this->Mdashboard->jumlah_siswa();
        $data['jumlah_guru'] = $this->Mdashboard->jumlah_guru();
        $data['jumlah_users'] = $this->Mdashboard->jumlah_users();
        $data['jumlah_kelas'] = $this->Mdashboard->jumlah_kelas();
        $data['jumlah_jurusan'] = $this->Mdashboard->jumlah_jurusan();

        $data['title'] = 'Dashboard';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('temp/footer', $data);
    }

    public function blank_page()
    {
        $data['userLog'] = $this->Mcustom->userLog();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'Blank Page';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('dashboard/blank_page', $data);
        $this->load->view('temp/footer', $data);
    }
}
