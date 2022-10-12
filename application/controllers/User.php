<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function data_user()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['user_res'] = $this->Muser->user_res()->result_array();

        $data['title'] = 'Data Pengguna';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('user/data_user', $data);
        $this->load->view('temp/footer', $data);
    }

    public function userProfil($username)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['user'] = $this->Muser->user($username)->row_array();
        $data['l_role'] = $this->db->get('u_role')->result_array();
        $data['l_active'] = $this->db->get('u_active')->result_array();
        

        $this->form_validation->set_rules('role_id', 'role akses', 'trim|required');
        $this->form_validation->set_rules('active_id', 'status akun', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil Pengguna';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('user/userProfil', $data);
            $this->load->view('temp/footer', $data);
        } else {
            $dataUpdate = [
                'role_id'               => htmlspecialchars($this->input->post('role_id', true)),
                'active_id'             => htmlspecialchars($this->input->post('active_id', true)),
                'date_update'           => date('Y-m-d H:i:s'),
            ];
            $this->db->where('username', $username);
            $this->db->update('u_user', $dataUpdate);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">perubahan berhasil disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            //redirect('user/userProfil/' . $username);
        }
    }

    public function userAdd()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['l_role'] = $this->db->get('u_role')->result_array();
        $data['l_active'] = $this->db->get('u_active')->result_array();

        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[u_user.username]|alpha_dash|alpha_numeric_spaces', [
            'alpha_numeric_spaces'  => 'Maaf, hanya huruf (a-z), dan angka (0-9) yang diizinkan.',
            'alpha_dash'            => 'Maaf, hanya huruf (a-z), dan angka (0-9) yang diizinkan.',
            'is_unique'             => 'username sudah digunakan',
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|is_unique[u_user.email]', [
            'is_unique'             => 'alamat email sudah digunakan',
        ]);
        $this->form_validation->set_rules('nama', 'nama pengguna', 'trim|required');
        $this->form_validation->set_rules('role_id', 'role akses', 'trim|required');
        $this->form_validation->set_rules('active_id', 'status akun', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Pengguna Baru';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('user/userAdd', $data);
            $this->load->view('temp/footer', $data);
        } else {
            $dataInsert = [
                'username'              => htmlspecialchars($this->input->post('username', true)),
                'nama'                  => htmlspecialchars($this->input->post('nama', true)),
                'email'                 => htmlspecialchars($this->input->post('email', true)),
                'role_id'               => htmlspecialchars($this->input->post('role_id', true)),
                'active_id'             => htmlspecialchars($this->input->post('active_id', true)),
                'date_created'          => date('Y-m-d H:i:s'),
                'date_update'           => date('Y-m-d H:i:s'),
                'password'              => htmlspecialchars(password_hash($this->input->post('username'), PASSWORD_DEFAULT)),
            ];
            $this->db->insert('u_user', $dataInsert);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">pengguna baru berhasil dibuat.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user/userAdd');
        }
    }

    public function data_userCetak()
    {
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['user_res'] = $this->Muser->user_res()->result_array();

        $data['title'] = 'Data Pengguna';
        $data = $this->load->view('user/data_userCetak', $data, true);

        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output("Data Pengguna.pdf", 'I');
    }

    public function resetPassword($username)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $this->db->set('password', password_hash($username, PASSWORD_DEFAULT));
        $this->db->where('username', $username);
        $this->db->update('u_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password berhasil direset.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('user/data_user');
    }

    public function userDelete($username)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $this->db->where('username', $username);
        $this->db->delete('u_user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">user berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('user/data_user');
    }

    public function aktivitasUsers()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['log_res'] = $this->Muser->aktivitasUsers()->result_array();

        $data['title'] = 'Aktivitas Pengguna';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('user/aktivitasUsers', $data);
        $this->load->view('temp/footer', $data);
    }

    public function aktivitasUsersCetak()
    {
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['log_res'] = $this->Muser->aktivitasUsers()->result_array();

        $data['title'] = 'Data Aktvitas Pengguna';
        $data = $this->load->view('user/aktivitasUsersCetak', $data, true);

        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output("Data Aktvitas Pengguna.pdf", 'I');
    }
}
