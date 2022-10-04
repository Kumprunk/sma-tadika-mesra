<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function akunProfil()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $this->form_validation->set_rules('nama', 'nama', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Akun Profil';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('userlog/akunProfil', $data);
            $this->load->view('temp/footer', $data);
        } else {
            #update u_user
            $updateUser = [
                'nama'      => htmlspecialchars($this->input->post('nama', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'date_update' => date('Y-m-d H:i:s'),
            ];
            $this->db->where('username', $data['userLog']['username']);
            $this->db->update('u_user', $updateUser);

            #update b_siswa jika ada
            $this->db->set('nama', htmlspecialchars($this->input->post('nama', true)));
            $this->db->where('nis', $data['userLog']['username']);
            $this->db->update('b_siswa');

            #update u_user_logaktivitas
            $dataInsertAktivitas = [
                'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                'datetime'      => date('Y-m-d H:i:s'),
                'keterangan'    => 'berhasil update akun',
            ];
            $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

            $this->session->set_flashdata('pesan1', '<div class="alert alert-success alert-dismissible fade show" role="alert">Perubahan berhasil disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('userlog/akunProfil');
        }
    }

    public function ubahPassword()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $this->form_validation->set_rules('pass1', 'Password lama', 'trim|required');
        $this->form_validation->set_rules('pass2', 'Password baru', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('pass3', 'Ulangi password baru', 'trim|required|matches[pass2]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Akun Profil';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('userlog/akunProfil', $data);
            $this->load->view('temp/footer', $data);
        } else {
            $pass_lama = $this->input->post('pass1');
            #cek password
            if (!password_verify($pass_lama, $data['userLog']['password'])) {
                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang anda masukan salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('userlog/akunProfil');
            } else {
                $pass_hash = htmlspecialchars(password_hash($this->input->post('pass2'), PASSWORD_DEFAULT));

                $this->db->set('password', $pass_hash);
                $this->db->where('username', $data['userLog']['username']);
                $this->db->update('u_user');

                #update u_user_logaktivitas
                $dataInsertAktivitas = [
                    'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                    'datetime'      => date('Y-m-d H:i:s'),
                    'keterangan'    => 'password akun berhasil diubah',
                ];
                $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

                $this->session->set_flashdata('pesan2', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('userlog/akunProfil');
            }
        }
    }

    public function logAktivitas()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['log_res'] = $this->Muserlog->log_res($data['userLog']['id'])->result_array();

        $data['title'] = 'Aktivitas Akun';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('userlog/logAktivitas', $data);
        $this->load->view('temp/footer', $data);
    }
}
