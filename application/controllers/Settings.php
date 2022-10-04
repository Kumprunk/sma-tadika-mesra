<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
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

        $data['title'] = 'Settings';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/index', $data);
        $this->load->view('temp/footer', $data);
    }

    public function general()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'General';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/general', $data);
        $this->load->view('temp/footer', $data);
    }

    public function helpCenter()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'Help Center';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/helpCenter', $data);
        $this->load->view('temp/footer', $data);
    }

    public function helpCenterUpdateFAQ()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        #update s_general
        $this->db->set('faq', $this->input->post('faq'));
        $this->db->where('id', 1);
        $this->db->update('s_general');

        #insert u_user_logaktivitas
        $dataInsertAktivitas = [
            'user_id'       => htmlspecialchars($data['userLog']['id'], true),
            'datetime'      => date('Y-m-d H:i:s'),
            'keterangan'    => 'berhasil update settings Help Center->faq',
        ];
        $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

        $this->session->set_flashdata('pesanFAQ', '<div class="alert alert-success alert-dismissible fade show" role="alert">FAQ berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('settings/helpCenter');
    }

    public function helpCenterUpdateKontak()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        #update s_general
        $this->db->set('kontak', $this->input->post('kontak'));
        $this->db->where('id', 1);
        $this->db->update('s_general');

        #insert u_user_logaktivitas
        $dataInsertAktivitas = [
            'user_id'       => htmlspecialchars($data['userLog']['id'], true),
            'datetime'      => date('Y-m-d H:i:s'),
            'keterangan'    => 'berhasil update settings Help Center->kontak kami',
        ];
        $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

        $this->session->set_flashdata('pesanKontak', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kontak berhasil di update.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('settings/helpCenter');
    }

    public function system()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $this->form_validation->set_rules('id_merchant', 'ID Merchant', 'trim');
        $this->form_validation->set_rules('client_key', 'Client Key', 'trim');
        $this->form_validation->set_rules('server_key', 'Server Key', 'trim');
        $this->form_validation->set_rules('url_status', 'URL Midtrans', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'System';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('settings/system', $data);
            $this->load->view('temp/footer', $data);
        } else {
            #update s_general
            $updateSystem = [
                'id_merchant'       => $this->input->post('id_merchant'),
                'client_key'        => $this->input->post('client_key'),
                'server_key'        => $this->input->post('server_key'),
                'url_status'        => $this->input->post('url_status'),
            ];
            $this->db->where('id', 1);
            $this->db->update('s_general', $updateSystem);

            #insert u_user_logaktivitas
            $dataInsertAktivitas = [
                'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                'datetime'      => date('Y-m-d H:i:s'),
                'keterangan'    => 'update settings system',
            ];
            $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil disimpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('settings/system');
        }
    }

    public function seo()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'SEO';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/seo', $data);
        $this->load->view('temp/footer', $data);
    }

    public function email()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'Email';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/email', $data);
        $this->load->view('temp/footer', $data);
    }

    public function security()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'Security';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/security', $data);
        $this->load->view('temp/footer', $data);
    }

    public function automation()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $data['title'] = 'Automation';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('settings/automation', $data);
        $this->load->view('temp/footer', $data);
    }
}
