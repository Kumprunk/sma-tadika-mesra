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
        $data['l_golda'] = $this->db->get('l_golda')->result_array();
        $data['l_agama'] = $this->db->get('l_agama')->result_array();
        $data['l_kecamatan'] = $this->db->get('l_kecamatan')->result_array();
        $data['l_kabupaten'] = $this->db->get('l_kabupaten')->result_array();
        $data['l_provinsi'] = $this->db->get('l_provinsi')->result_array();
        $data['l_negara'] = $this->db->get('l_negara')->result_array();
        $data['l_pendidikan'] = $this->db->get('l_pendidikan')->result_array();
        $data['l_pekerjaan'] = $this->db->get('l_pekerjaan')->result_array();
        $data['l_penghasilan'] = $this->db->get('l_penghasilan')->result_array();

        # DATA GURU
        
        $this->form_validation->set_rules('nip', 'nip', 'trim|required|is_unique[c_guru.nip]|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
        $this->form_validation->set_rules('mapel', 'mapel', 'trim|required');
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('tgl_daftar', 'tgl_daftar', 'trim|required');

        # DATA PRIBADI GURU
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|min_length[16]|max_length[16]|numeric|is_unique[c_guru.nik]');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'tmp_lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('golda', 'golda', 'trim');
        $this->form_validation->set_rules('agama', 'agama', 'trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|max_length[50]');
        $this->form_validation->set_rules('kel', 'kel', 'trim|required');
        $this->form_validation->set_rules('kec', 'kec', 'trim|required');
        $this->form_validation->set_rules('kab', 'kab', 'trim|required');
        $this->form_validation->set_rules('prov', 'prov', 'trim|required');
        $this->form_validation->set_rules('negara', 'negara', 'trim|required');
        $this->form_validation->set_rules('kodepos', 'kodepos', 'trim|numeric|min_length[5]|max_length[5]');
        $this->form_validation->set_rules('telp', 'telp', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');

        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Guru Baru';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar',$data);
            $this->load->view('guru/guru_add',$data);
            $this->load->view('temp/footer',$data);
            
        } else {
            
            # INSERT C_GURU
            $insert_guru = [
                # INSERT DATA GURU
                'nip'           => htmlspecialchars($this->input->post('nip', true)),
                'status_id'     => htmlspecialchars($this->input->post('status', true)),
                'guru_mapel'    => htmlspecialchars($this->input->post('mapel', true)),
                'guru_kelas'    => htmlspecialchars($this->input->post('kelas', true)),
                'golongan_id'   => htmlspecialchars($this->input->post('golongan', true)),
                'tgl_daftar'    => htmlspecialchars($this->input->post('tgl_daftar', true)),
                
                # INSERT DATA PRIBADI GURU
                'nama'          => htmlspecialchars($this->input->post('nama',true)),
                'nik'           => htmlspecialchars($this->input->post('nik',true)),
                'jk'            => htmlspecialchars($this->input->post('jk',true)),
                'tmp_lahir'     => htmlspecialchars($this->input->post('tmp_lahir',true)),
                'tgl_lahir'     => htmlspecialchars($this->input->post('tgl_lahir',true)),
                'golda'         => htmlspecialchars($this->input->post('golda',true)),
                'agama'         => htmlspecialchars($this->input->post('agama',true)),
                'alamat'        => htmlspecialchars($this->input->post('alamat',true)),
                'kel'           => htmlspecialchars($this->input->post('kel',true)),
                'kec'           => htmlspecialchars($this->input->post('kec',true)),
                'kab'           => htmlspecialchars($this->input->post('kab',true)),
                'prov'          => htmlspecialchars($this->input->post('prov',true)),
                'negara'        => htmlspecialchars($this->input->post('negara',true)),
                'kodepos'       => htmlspecialchars($this->input->post('kodepos',true)),
                'telp'          => htmlspecialchars($this->input->post('telp',true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
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
            // print_r($insert_guru);
            // print_r($insert_user);
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
