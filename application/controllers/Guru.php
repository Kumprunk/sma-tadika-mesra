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
        $data['userLog']        = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general']        = $this->Mcustom->general();
        $data['guru_res']       = $this->Mguru->guru_res()->result_array();
        $data['status_guru']    = $this->db->get('c_status')->result_array();
        $data['golongan_guru']  = $this->db->get('c_golongan')->result_array();
        $data['guru_mapel']    = $this->db->get('b_mapel')->result_array();
        $data['guru_kelas']  = $this->db->get('b_kelas')->result_array();

        # DATA GURU
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required|is_unique[c_guru.nip]|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        $this->form_validation->set_rules('telp', 'telp', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
        

        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Guru Baru';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar',$data);
            $this->load->view('guru/guru_add',$data);
            $this->load->view('temp/footer',$data);
            
        } else {
            
            # INSERT GURU
            $insert_guru = [
                'nama'          => htmlspecialchars($this->input->post('nama',true)),
                'nip'           => htmlspecialchars($this->input->post('nip', true)),
                'jk'            => htmlspecialchars($this->input->post('jk',true)),
                'telp'          => htmlspecialchars($this->input->post('telp',true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'status_id'     => htmlspecialchars($this->input->post('status', true)),
                'golongan_id'   => htmlspecialchars($this->input->post('golongan', true)),
                'guru_kelas'    => htmlspecialchars($this->input->post('kelas', true)),
                'guru_mapel'    => htmlspecialchars($this->input->post('mapel', true)),
                'foto'          => 'default.png'
            ];
            $this->db->insert('c_guru', $insert_guru);
            # INSERT U_USER
            $insert_user = [
                'username'          => htmlspecialchars($this->input->post('nip', true)),
                'nama'              => htmlspecialchars($this->input->post('nama', true)),
                'password'          => htmlspecialchars(password_hash($this->input->post('nip'), PASSWORD_DEFAULT)),
                'email'             => htmlspecialchars($this->input->post('email', true)),
                'role_id'           => 4,
                'active_id'         => 1,
                'date_created'      => date('Y-m-d H:i:s'),
                'date_update'       => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('u_user', $insert_user);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Guru baru berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('guru/guruAdd');
        }  
    }

    public function profil_guru($nip)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['guru'] = $this->Mguru->guru($nip)->row_array();

    //print_r($data);
        $data['title'] = $data['guru']['nip'] . ' - ' . $data['guru']['nama'];
        $data['title2'] = 'Profil';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('guru/topbar', $data);
        $this->load->view('guru/profil_guru', $data);
        $this->load->view('temp/footer', $data);
    }
}
