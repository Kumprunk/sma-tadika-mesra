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

    public function biodata()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['guru']    = $this->Mgurulog->guru($data['userLog']['username'])->row_array();

        // print_r($data['userLog']['username']);
        $data['title'] = 'Profil';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('gurulog/biodata', $data);
        $this->load->view('temp/footer', $data);
    }

    public function biodata_update()
    {
        $data['userLog']        = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general']        = $this->Mcustom->general();
        $data['guru']           = $this->Mgurulog->guru($data['userLog']['username'])->row_array();
        $data['status_guru']    = $this->db->get('c_status')->result_array();
        $data['golongan_guru']  = $this->db->get('c_golongan')->result_array();
        $data['guru_mapel']     = $this->db->get('b_mapel')->result_array();
        $data['guru_kelas']     = $this->db->get('b_kelas')->result_array();
        $data['l_golda']        = $this->db->get('l_golda')->result_array();
        $data['l_agama']        = $this->db->get('l_agama')->result_array();
        $data['l_kecamatan']    = $this->db->get('l_kecamatan')->result_array();
        $data['l_kabupaten']    = $this->db->get('l_kabupaten')->result_array();
        $data['l_provinsi']     = $this->db->get('l_provinsi')->result_array();
        $data['l_negara']       = $this->db->get('l_negara')->result_array();
        
       

        # BIODATA
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|min_length[16]|max_length[16]|numeric|is_unique[c_guru.nik]');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('tmp_lahir', 'tmp_lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('golda', 'golda', 'trim');

        # KEWARGANEGARAAN
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
            $data['title'] = 'Ubah Biodata';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar',$data);
            $this->load->view('gurulog/biodata_update',$data);
            $this->load->view('temp/footer',$data);
            
        } else {
            
            # UPDATE C_GURU
            $update_guru = [
                # UPDATE BIODATA
                'nama'          => htmlspecialchars($this->input->post('nama',true)),
                'nik'           => htmlspecialchars($this->input->post('nik',true)),
                'jk'            => htmlspecialchars($this->input->post('jk',true)),
                'tmp_lahir'     => htmlspecialchars($this->input->post('tmp_lahir',true)),
                'tgl_lahir'     => htmlspecialchars($this->input->post('tgl_lahir',true)),
                'golda'         => htmlspecialchars($this->input->post('golda',true)),
                
                # UPDATE KEWARGANEGARAAN
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
            ];
           
            $this->db->where('nip', $data['guru']['nip']);
            $this->db->update('c_guru', $update_guru);
            
            #update u_user
            $this->db->set('nama', htmlspecialchars($this->input->post('nama', true)));
            $this->db->where('username', $data['guru']['nip']);
            $this->db->update('u_user');

            #update u_user_logaktivitas
            $dataInsertAktivitas = [
                'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                'datetime'      => date('Y-m-d H:i:s'),
                'keterangan'    => 'berhasil update biodata',
            ];
            $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Biodata berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('gurulog/biodata');
            // print_r($update_guru);
            
        }  
    }

    public function transkip_nilai($nis)
    {
        $data['userLog']        = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general']        = $this->Mcustom->general();
        $data['siswa']          = $this->Msiswa->siswa($nis)->row_array();
        $data['nilai_res']      = $this->Mgurulog->nilai_res($data['siswa']['nis'])->result_array();
        $data['nilai_tugas']    = $this->db->get_where('b_nilai_tugas',$data['siswa']['nis'])->row_array();

        $data['title'] = $data['siswa']['nis'] . ' - ' . $data['siswa']['nama'];
        $data['title2'] = 'Transkrip Nilai';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/topbar', $data);
        $this->load->view('gurulog/transkipnilaiSiswa', $data);
        $this->load->view('temp/footer', $data);
        // print_r($data['nilai_tugas']);
    }

    public function nilai_tugas()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['guru']    = $this->Mgurulog->guru($data['userLog']['username'])->row_array();
        $data['siswaRes'] = $this->Mgurulog->siswaRes($data['guru']['guru_kelas'])->result_array();

        $data['title'] = 'Data Siswa';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('gurulog/nilai_tugas', $data);
        $this->load->view('temp/footer', $data);
        // print_r($data);
    }

    public function tambahnilai($nis)
    {
        $data['userLog']        = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general']        = $this->Mcustom->general();
        // $data['guru']           = $this->Mgurulog->guru($data['userLog']['username'])->row_array();
        $data['semester']       = $this->db->get('b_semester')->result_array();
        $data['nilai']          = $this->Mgurulog->nilai_res($nis)->row_array();
        $data['insert_id']      = $this->db->insert_id('b_nilai_tugas');
        $data['guru']           = $this->Mgurulog->guru($data['userLog']['username'])->row_array();

        
        $data['title'] = 'Tambah Nilai Tugas Siswa';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar',$data);
        $this->load->view('gurulog/tambah_tugas', $data);
        $this->load->view('temp/footer',$data);

        // $data['title'] = 'Nilai Tugas Siswa';
        // $this->load->view('temp/header', $data);
        // $this->load->view('temp/navbar', $data);
        // $this->load->view('temp/sidebar',$data);
        // $this->load->view('gurulog/update_tugas',$data);
        // $this->load->view('temp/footer',$data);
        // print_r($data['tugasRes']);
        // print_r($data['insert_id']);
    }



}