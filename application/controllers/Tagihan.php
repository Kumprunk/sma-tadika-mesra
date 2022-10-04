<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function data_tagihan()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['tagihan_res'] = $this->Mtagihan->tagihan_res()->result_array();

        $data['title'] = 'Daftar Tagihan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
       
        $this->load->view('tagihan/data_tagihan', $data);
        $this->load->view('temp/footer', $data);
    }

    public function tagihanAdd()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['l_siswa'] = $this->db->get('b_siswa')->result_array();

        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
        $this->form_validation->set_rules('jml_tagihan', 'jml_tagihan', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Tagihan Baru';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('tagihan/tagihanAdd', $data);
            $this->load->view('temp/footer', $data);
        } else {
            $nis = $this->input->post('nis', true);
            $bulan = date('Y-m-01', strtotime($this->input->post('bulan')));
            $tag2 = $this->db->get_where('b_tagihan', ['nis' => $nis, 'bulan' => $bulan])->row_array();

            #cek tagihan
            if ($tag2 != null) {
                #cek nis, apakah tagihan untuk siswa ini sudah ada
                if ($tag2['nis'] == $nis) {
                    #cek bulan, apakah tagihan untuk siswa ini sudah ada
                    if ($tag2['bulan'] == $bulan) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Maaf, tagihan untuk siswa bulan ini sudah ada.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('tagihan/tagihanAdd');
                    }
                }
            } else {
                $dataInsert = [
                    'nis'           => $nis,
                    'bulan'         => $bulan,
                    'jml_tagihan'   => htmlspecialchars($this->input->post('jml_tagihan', true)),
                ];
                $this->db->insert('b_tagihan', $dataInsert);

                #insert u_user_logaktivitas
                $dataInsertAktivitas = [
                    'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                    'datetime'      => date('Y-m-d H:i:s'),
                    'keterangan'    => 'create new tagihan' . ' ' . $nis,
                ];
                $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Tagihan untuk siswa ini berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('tagihan/tagihanAdd');
            }
        }
    }

    public function tagihanDetail($id)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        // $data['tagihan'] = $this->Mtagihan->tagihan_row()->row_array();
        $data['tagihan'] = $this->db->get_where('b_tagihan', ['id' => $id])->row_array();

        $data['title'] = 'Detail Tagihan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('tagihan/tagihanDetail', $data);
        $this->load->view('temp/footer', $data);
    }
}
