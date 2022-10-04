<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard/index');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $data['general'] = $this->Mcustom->general();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('temp/header', $data);
            $this->load->view('login/index', $data);
        } else {
            $this->_cekLogin();
        }
    }

    private function _cekLogin()
    {
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $user           = $this->db->get_where('u_user', ['username' => $username])->row_array();

        ## jika usernya ada
        if ($user != null) {
            ## cek status akun
            if ($user['active_id'] == 1) {
                ## cek password
                if (password_verify($password, $user['password'])) {
                    ## data session
                    $data = [
                        'username'      => $user['username'],
                        'role_id'       => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);

                    #update u_user_logaktivitas
                    $dataInsertAktivitas = [
                        'user_id'       => htmlspecialchars($user['id']),
                        'datetime'      => date('Y-m-d H:i:s'),
                        'keterangan'    => 'login',
                    ];
                    $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

                    redirect('dashboard/index');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('login/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau NISN di nonaktifkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username or NISN tidak terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('login/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        redirect('login/index');
    }

    public function blocked403()
    {
        $data['title'] = 'Blocked 403';
        // $this->load->view('temp/header', $data);
        $this->load->view('login/blocked403', $data);
    }


    public function forgotPassword()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard/index');
        }

        $data['general'] = $this->Mcustom->general();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('temp/header', $data);
            $this->load->view('login/forgotPassword', $data);
        } else {
            // $this->_cekLogin();
        }
    }

    public function resetPassword()
    {
        $data['general'] = $this->Mcustom->general();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Reset Password';
            $this->load->view('temp/header', $data);
            $this->load->view('login/resetPassword', $data);
        } else {
            // $this->_cekLogin();
        }
    }
}
