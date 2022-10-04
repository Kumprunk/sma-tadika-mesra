<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $midtrans = $this->Mcustom->general();
        if ($midtrans['status'] == 'TRUE') {
            $params = array('server_key' => $midtrans['server_key'], 'production' => TRUE);
        } elseif ($midtrans['status'] == 'FALSE') {
            $params = array('server_key' => $midtrans['server_key'], 'production' => FALSE);
        }
        $this->load->library('midtrans');
        $this->midtrans->config($params);
    }

    public function profil()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();

        $data['title'] = 'Profil';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/profil', $data);
        $this->load->view('temp/footer', $data);
    }

    public function ubahFoto()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();

        # jika ada foto yg di upload
        $upload_foto = $_FILES['foto']['name'];
        if ($upload_foto) {
            $config['upload_path'] = './assets/img/siswa/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['siswa']['foto'];
                if ($old_foto != 'default.png') {
                    unlink(FCPATH . 'assets/img/siswa/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');

                $this->db->set('foto', $new_foto);
                $this->db->where('nis', $data['siswa']['nis']);
                $this->db->update('b_siswa');

                #insert u_user_logaktivitas
                $dataInsertAktivitas = [
                    'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                    'datetime'      => date('Y-m-d H:i:s'),
                    'keterangan'    => 'berhasil update foto',
                ];
                $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/profil');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/profil');
            }
        }
    }

    public function biodata()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();

        $data['title'] = 'Biodata';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/biodata', $data);
        $this->load->view('temp/footer', $data);
    }

    public function biodataUpdate()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['l_golda'] = $this->db->get('l_golda')->result_array();
        $data['l_agama'] = $this->db->get('l_agama')->result_array();
        $data['l_kecamatan'] = $this->db->get('l_kecamatan')->result_array();
        $data['l_kabupaten'] = $this->db->get('l_kabupaten')->result_array();
        $data['l_provinsi'] = $this->db->get('l_provinsi')->result_array();
        $data['l_negara'] = $this->db->get('l_negara')->result_array();

        ##biodata
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('nik', 'nik', 'trim|numeric|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('tmp_lhr', 'tmp_lhr', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('tgl_lhr', 'tgl_lhr', 'trim|required');
        $this->form_validation->set_rules('golda', 'golda', 'trim');
        ##kewenegaraan
        $this->form_validation->set_rules('agama', 'agama', 'trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|max_length[50]');
        $this->form_validation->set_rules('kel', 'kel', 'trim');
        $this->form_validation->set_rules('kec', 'kec', 'trim');
        $this->form_validation->set_rules('kab', 'kab', 'trim');
        $this->form_validation->set_rules('prov', 'prov', 'trim');
        $this->form_validation->set_rules('negara', 'negara', 'trim');
        $this->form_validation->set_rules('kodepos', 'kodepos', 'trim|numeric|min_length[5]|max_length[5]');
        $this->form_validation->set_rules('telp', 'telp', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        ##pendidikan sebelumnya
        $this->form_validation->set_rules('asal_sekolah', 'asal_sekolah', 'trim');
        $this->form_validation->set_rules('no_skhu', 'no_skhu', 'trim');
        $this->form_validation->set_rules('no_ijazah', 'no_ijazah', 'trim');
        $this->form_validation->set_rules('nilai_un', 'nilai_un', 'trim|numeric|max_length[2]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Biodata';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('siswalog/biodataUpdate', $data);
            $this->load->view('temp/footer', $data);
        } else {
            #update b_siswa
            $dataUpdate = [
                ##biodata
                'nama'              => htmlspecialchars($this->input->post('nama', true)),
                'nik'               => htmlspecialchars($this->input->post('nik', true)),
                'jk'                => htmlspecialchars($this->input->post('jk', true)),
                'tmp_lhr'           => htmlspecialchars($this->input->post('tmp_lhr', true)),
                'tgl_lhr'           => htmlspecialchars($this->input->post('tgl_lhr', true)),
                'golda'             => htmlspecialchars($this->input->post('golda', true)),
                ##kewenegaraan
                'agama'            => htmlspecialchars($this->input->post('agama', true)),
                'alamat'           => htmlspecialchars($this->input->post('alamat', true)),
                'kel'              => htmlspecialchars($this->input->post('kel', true)),
                'kec'              => htmlspecialchars($this->input->post('kec', true)),
                'kab'              => htmlspecialchars($this->input->post('kab', true)),
                'prov'             => htmlspecialchars($this->input->post('prov', true)),
                'negara'           => htmlspecialchars($this->input->post('negara', true)),
                'kodepos'          => htmlspecialchars($this->input->post('kodepos', true)),
                'telp'             => htmlspecialchars($this->input->post('telp', true)),
                'email'            => htmlspecialchars($this->input->post('email', true)),
            ];
            $this->db->where('nis', $data['siswa']['nis']);
            $this->db->update('b_siswa', $dataUpdate);

            #update b_siswa2
            $dataUpdate2 = [
                'asal_sekolah'      => htmlspecialchars($this->input->post('asal_sekolah', true)),
                'no_skhu'           => htmlspecialchars($this->input->post('no_skhu', true)),
                'no_ijazah'         => htmlspecialchars($this->input->post('no_ijazah', true)),
                'nilai_un'          => htmlspecialchars($this->input->post('nilai_un', true)),
            ];
            $this->db->where('nis', $data['siswa']['nis']);
            $this->db->update('b_siswa2', $dataUpdate2);

            #update u_user
            $this->db->set('nama', htmlspecialchars($this->input->post('nama', true)));
            $this->db->where('username', $data['siswa']['nis']);
            $this->db->update('u_user');

            #update u_user_logaktivitas
            $dataInsertAktivitas = [
                'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                'datetime'      => date('Y-m-d H:i:s'),
                'keterangan'    => 'berhasil update biodata',
            ];
            $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Biodata berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('siswalog/biodata');
        }
    }

    public function orangtua()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();

        $data['title'] = 'Data Orang Tua';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/orangtua', $data);
        $this->load->view('temp/footer', $data);
    }

    public function orangtuaUpdate()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['l_pendidikan'] = $this->db->get('l_pendidikan')->result_array();
        $data['l_pekerjaan'] = $this->db->get('l_pekerjaan')->result_array();
        $data['l_penghasilan'] = $this->db->get('l_penghasilan')->result_array();
        $data['l_kecamatan'] = $this->db->get('l_kecamatan')->result_array();
        $data['l_kabupaten'] = $this->db->get('l_kabupaten')->result_array();
        $data['l_provinsi'] = $this->db->get('l_provinsi')->result_array();
        $data['l_negara'] = $this->db->get('l_negara')->result_array();

        ##ayah
        $this->form_validation->set_rules('nama_ayah', 'nama_ayah', 'trim|max_length[30]');
        $this->form_validation->set_rules('status_ayah', 'status_ayah', 'trim');
        $this->form_validation->set_rules('pendidikan_ayah', 'pendidikan_ayah', 'trim');
        $this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'trim');
        $this->form_validation->set_rules('penghasilan_ayah', 'penghasilan_ayah', 'trim');
        $this->form_validation->set_rules('telp_ayah', 'telp_ayah', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_ayah', 'email_ayah', 'trim|valid_email');
        ##ibu
        $this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'trim|max_length[30]');
        $this->form_validation->set_rules('status_ibu', 'status_ibu', 'trim');
        $this->form_validation->set_rules('pendidikan_ibu', 'pendidikan_ibu', 'trim');
        $this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan_ibu', 'trim');
        $this->form_validation->set_rules('penghasilan_ibu', 'penghasilan_ibu', 'trim');
        $this->form_validation->set_rules('telp_ibu', 'telp_ibu', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_ibu', 'email_ibu', 'trim|valid_email');
        ##wali
        $this->form_validation->set_rules('nama_wali', 'nama_wali', 'trim|max_length[30]');
        $this->form_validation->set_rules('status_wali', 'status_wali', 'trim');
        $this->form_validation->set_rules('pendidikan_wali', 'pendidikan_wali', 'trim');
        $this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan_wali', 'trim');
        $this->form_validation->set_rules('penghasilan_wali', 'penghasilan_wali', 'trim');
        $this->form_validation->set_rules('telp_wali', 'telp_wali', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_wali', 'email_wali', 'trim|valid_email');
        ##data orangtua
        $this->form_validation->set_rules('alamat_orangtua', 'alamat_orangtua', 'trim|max_length[50]');
        $this->form_validation->set_rules('kel_orangtua', 'kel_orangtua', 'trim');
        $this->form_validation->set_rules('kec_orangtua', 'kec_orangtua', 'trim');
        $this->form_validation->set_rules('kab_orangtua', 'kab_orangtua', 'trim');
        $this->form_validation->set_rules('prov_orangtua', 'prov_orangtua', 'trim');
        $this->form_validation->set_rules('negara_orangtua', 'negara_orangtua', 'trim');
        $this->form_validation->set_rules('kodepos_orangtua', 'kodepos_orangtua', 'trim|numeric|min_length[5]|max_length[5]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Data Orang Tua';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('siswalog/orangtuaUpdate', $data);
            $this->load->view('temp/footer', $data);
        } else {
            $updateOrangtua = [
                ##ayah
                'nama_ayah'             => htmlspecialchars($this->input->post('nama_ayah', true)),
                'status_ayah'           => htmlspecialchars($this->input->post('status_ayah', true)),
                'pendidikan_ayah'       => htmlspecialchars($this->input->post('pendidikan_ayah', true)),
                'pekerjaan_ayah'        => htmlspecialchars($this->input->post('pekerjaan_ayah', true)),
                'penghasilan_ayah'      => htmlspecialchars($this->input->post('penghasilan_ayah', true)),
                'telp_ayah'             => htmlspecialchars($this->input->post('telp_ayah', true)),
                'email_ayah'            => htmlspecialchars($this->input->post('email_ayah', true)),
                ##ibu
                'nama_ibu'             => htmlspecialchars($this->input->post('nama_ibu', true)),
                'status_ibu'           => htmlspecialchars($this->input->post('status_ibu', true)),
                'pendidikan_ibu'       => htmlspecialchars($this->input->post('pendidikan_ibu', true)),
                'pekerjaan_ibu'        => htmlspecialchars($this->input->post('pekerjaan_ibu', true)),
                'penghasilan_ibu'      => htmlspecialchars($this->input->post('penghasilan_ibu', true)),
                'telp_ibu'             => htmlspecialchars($this->input->post('telp_ibu', true)),
                'email_ibu'            => htmlspecialchars($this->input->post('email_ibu', true)),
                ##wali
                'nama_wali'             => htmlspecialchars($this->input->post('nama_wali', true)),
                'status_wali'           => htmlspecialchars($this->input->post('status_wali', true)),
                'pendidikan_wali'       => htmlspecialchars($this->input->post('pendidikan_wali', true)),
                'pekerjaan_wali'        => htmlspecialchars($this->input->post('pekerjaan_wali', true)),
                'penghasilan_wali'      => htmlspecialchars($this->input->post('penghasilan_wali', true)),
                'telp_wali'             => htmlspecialchars($this->input->post('telp_wali', true)),
                'email_wali'            => htmlspecialchars($this->input->post('email_wali', true)),
                ##data orangtua
                'alamat_orangtua'       => htmlspecialchars($this->input->post('alamat_orangtua', true)),
                'kel_orangtua'          => htmlspecialchars($this->input->post('kel_orangtua', true)),
                'kec_orangtua'          => htmlspecialchars($this->input->post('kec_orangtua', true)),
                'kab_orangtua'          => htmlspecialchars($this->input->post('kab_orangtua', true)),
                'prov_orangtua'         => htmlspecialchars($this->input->post('prov_orangtua', true)),
                'negara_orangtua'       => htmlspecialchars($this->input->post('negara_orangtua', true)),
                'kodepos_orangtua'      => htmlspecialchars($this->input->post('kodepos_orangtua', true)),
            ];
            $this->db->where('nis', $data['siswa']['nis']);
            $this->db->update('b_orangtua', $updateOrangtua);

            #update u_user_logaktivitas
            $dataInsertAktivitas = [
                'user_id'       => htmlspecialchars($data['userLog']['id'], true),
                'datetime'      => date('Y-m-d H:i:s'),
                'keterangan'    => 'berhasil update data orang tua/wali',
            ];
            $this->db->insert('u_user_logaktivitas', $dataInsertAktivitas);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data orang tua berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('siswalog/orangtua');
        }
    }

    public function transkripnilai()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['nilai_res'] = $this->Msiswalog->nilai_res($data['siswa']['nis'])->result_array();

        $data['title'] = 'Transkrip Nilai';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/transkripnilai', $data);
        $this->load->view('temp/footer', $data);
    }

    public function transkripNilaiCetak()
    {
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['nilai_res'] = $this->Msiswalog->nilai_res($data['siswa']['nis'])->result_array();

        $data['title'] = 'Transkrip Nilai';
        $data = $this->load->view('siswalog/transkripNilaiCetak', $data, true);

        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output("Transkrip Nilai.pdf", 'I');
    }

    public function skaktifCetak()
    {
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();

        $data['title'] = 'Surat Keterangan Aktif';
        $data = $this->load->view('siswalog/skaktifCetak', $data, true);

        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output("Surat Keterangan Aktif.pdf", 'I');
    }

    public function tagihan()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['tagihan_res'] = $this->Msiswalog->tagihan_res($data['siswa']['nis'])->result_array();

        $data['title'] = 'Tagihan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/tagihan', $data);
        $this->load->view('temp/footer', $data);
    }

    public function tagihanCetak()
    {
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['tagihan_res'] = $this->Msiswalog->tagihan_res($data['siswa']['nis'])->result_array();

        $data['title'] = 'Daftar Tagihan Bulanan';
        $data = $this->load->view('siswalog/tagihanCetak', $data, true);

        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($data);
        $mpdf->Output("Daftar Tagihan Bulanan.pdf", 'I');
    }

    public function detailTagihan($id)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['tagihan'] = $this->Msiswalog->tagihan($id)->row_array();

        $data['title'] = 'Detail Tagihan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/detailTagihan', $data);
        $this->load->view('temp/footer', $data);
    }

    public function checkout($id)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();
        $data['tagihan'] = $this->Msiswalog->tagihan($id)->row_array();

        $data['title'] = 'CheckOut';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswalog/checkout', $data);
        $this->load->view('temp/footer', $data);
    }

    public function checkouttoken()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswalog->siswa($data['userLog']['username'])->row_array();

        $id_tagihan = $this->input->post('id_tagihan', true);

        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('jml_tagihan', 'jml_tagihan', 'trim|required|numeric');
        $this->form_validation->set_rules('bulan', 'bulan', 'trim');
        $this->form_validation->set_rules('telp', 'telp', 'trim|numeric');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failled!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('siswalog/checkout/' . $id_tagihan);
        } else {
            $nis         = htmlspecialchars($this->input->post('nis', true));
            $jml_tagihan = htmlspecialchars($this->input->post('jml_tagihan', true));
            $bulan       = htmlspecialchars($this->input->post('bulan', true));
            $telp        = htmlspecialchars($this->input->post('telp', true));
            $email       = htmlspecialchars($this->input->post('email', true));

            // Required
            $transaction_details = array(
                'order_id' => rand(),
                'gross_amount' => $jml_tagihan, // no decimal allowed for creditcard
            );

            // Optional
            $item1_details = array(
                'id' => 'a1',
                'price' => $jml_tagihan,
                'quantity' => 1,
                'name' => "Tagihan" . " " . strftime('%B %Y', strtotime($bulan)),
            );

            // Optional
            // $item2_details = array(
            //     'id' => 'a2',
            //     'price' => 20000,
            //     'quantity' => 2,
            //     'name' => "Orange"
            // );

            // Optional
            $item_details = array($item1_details);

            // Optional
            // $billing_address = array(
            //     'first_name'    => "Andri",
            //     'last_name'     => "Litani",
            //     'address'       => "Mangga 20",
            //     'city'          => "Jakarta",
            //     'postal_code'   => "16602",
            //     'phone'         => "081122334455",
            //     'country_code'  => 'IDN'
            // );

            // Optional
            $shipping_address = array(
                'first_name'    => $nis,
                // 'last_name'     => "Supriadi",
                'address'       => $email,
                // 'city'          => "Jakarta",
                // 'postal_code'   => "16601",
                // 'phone'         => "08113366345",
                // 'country_code'  => 'IDN'
            );

            // Optional
            $customer_details = array(
                'first_name'    => $nis . " - " . $data['siswa']['nama'],
                // 'last_name'     => "Litani",
                // 'email'         => "example1@gmail.com",
                'phone'         => $telp,
                // 'billing_address'  => $billing_address,
                'shipping_address' => $shipping_address
            );

            // Data yang akan dikirim untuk request redirect_url.
            $credit_card['secure'] = true;
            //ser save_card true to enable oneclick or 2click
            //$credit_card['save_card'] = true;

            $time = time();
            $custom_expiry = array(
                'start_time' => date("Y-m-d H:i:s O", $time),
                'unit' => 'days',
                'duration'  => 1
            );

            $transaction_data = array(
                'transaction_details' => $transaction_details,
                'item_details'       => $item_details,
                'customer_details'   => $customer_details,
                'credit_card'        => $credit_card,
                'expiry'             => $custom_expiry
            );

            error_log(json_encode($transaction_data));
            $snapToken = $this->midtrans->getSnapToken($transaction_data);
            error_log($snapToken);
            echo $snapToken;
        }
    }

    public function checkoutfinish()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();

        $result = json_decode($this->input->post('result_data'), true);
        // echo 'RESULT <br><pre>';
        // var_dump($result);
        // echo '</pre>';

        $id_tagihan     = htmlspecialchars($this->input->post('id_tagihan', true));
        $nis            = htmlspecialchars($this->input->post('nis', true));
        $nama           = htmlspecialchars($this->input->post('nama', true));
        $jml_tagihan    = htmlspecialchars($this->input->post('jml_tagihan', true));
        $bulan          = date('Y-m-d', strtotime($this->input->post('bulan')));
        $telp           = htmlspecialchars($this->input->post('telp', true));
        $email          = htmlspecialchars($this->input->post('email', true));
        $catatan        = htmlspecialchars($this->input->post('catatan', true));


        # ATM/Bank Transfer (BCA), ATM/Bank Transfer (BRI), ATM/Bank Transfer (BNI),
        if ($result['va_numbers']) {
            $data = [
                'status_kode'           => $result['status_code'],
                'order_id'              => $result['order_id'],
                'transaksi_id'          => $result['transaction_id'],
                'jumlah'                => $result['gross_amount'],
                'tipe_transaksi'        => 'Bank Transfer',
                'wkt_transaksi'         => $result['transaction_time'],
                'wkt_kadaluarsa'        => $result['transaction_time'],
                'bank'                  => $result['va_numbers'][0]["bank"],
                'va_numbers'            => $result['va_numbers'][0]["va_number"],
                // 'biller_code'           => $result['biller_code'],
                'pdf_url'               => $result['pdf_url'],
                'nis'                   => $nis,
                'telp'                  => $telp,
                'email'                 => $email,
                'penerima'              => 'system midtrans',
                'catatan'               => $catatan,
            ];
            $this->db->where('id', $id_tagihan);
            $simpan = $this->db->update('b_tagihan', $data);

            if ($simpan) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            }

            # ATM/Bank Transfer (Mandiri)
        } elseif ($result['bill_key']) {
            $data = [
                'status_kode'           => $result['status_code'],
                'order_id'              => $result['order_id'],
                'transaksi_id'          => $result['transaction_id'],
                'jumlah'                => $result['gross_amount'],
                'tipe_transaksi'        => 'Bank Transfer',
                'wkt_transaksi'         => $result['transaction_time'],
                'wkt_kadaluarsa'        => $result['transaction_time'],
                'bank'                  => 'Mandiri',
                'va_numbers'            => $result['bill_key'],
                'biller_code'           => $result['biller_code'],
                'pdf_url'               => $result['pdf_url'],
                'nis'                   => $nis,
                'telp'                  => $telp,
                'email'                 => $email,
                'penerima'              => 'system midtrans',
                'catatan'               => $catatan,
            ];
            $this->db->where('id', $id_tagihan);
            $simpan = $this->db->update('b_tagihan', $data);

            if ($simpan) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            }

            # ATM/Bank Transfer (Permata)
        } elseif (($result['permata_va_number'])) {
            $data = [
                'status_kode'           => $result['status_code'],
                'order_id'              => $result['order_id'],
                'transaksi_id'          => $result['transaction_id'],
                'jumlah'                => $result['gross_amount'],
                'tipe_transaksi'       => 'Bank Transfer',
                'wkt_transaksi'         => $result['transaction_time'],
                'wkt_kadaluarsa'        => $result['transaction_time'],
                'bank'                  => 'Permata',
                'va_numbers'            => $result['permata_va_number'],
                'pdf_url'               => $result['pdf_url'],
                'nis'                   => $nis,
                'telp'                  => $telp,
                'email'                 => $email,
                'penerima'              => 'system midtrans',
                'catatan'               => $catatan,
            ];
            $this->db->where('id', $id_tagihan);
            $simpan = $this->db->update('b_tagihan', $data);

            if ($simpan) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            }

            // Go-Pay
        } elseif ($result['payment_type'] == 'gopay') {
            $data = [
                'status_kode'           => $result['status_code'],
                'order_id'              => $result['order_id'],
                'transaksi_id'          => $result['transaction_id'],
                'jumlah'                => $result['gross_amount'],
                'tipe_transaksi'       => $result['payment_type'],
                'wkt_transaksi'         => $result['transaction_time'],
                'wkt_kadaluarsa'        => $result['transaction_time'],
                'bank'                  => 'Go-Pay',
                'pdf_url'               => $result['pdf_url'],
                'nis'                   => $nis,
                'telp'                  => $telp,
                'email'                 => $email,
                'penerima'              => 'system midtrans',
                'catatan'               => $catatan,
            ];
            $this->db->where('id', $id_tagihan);
            $simpan = $this->db->update('b_tagihan', $data);

            if ($simpan) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            }

            #Alfa Group & Indomaret
        } elseif ($result['payment_code']) {
            ##jika alfa group
            if ($result['fraud_status']) {
                $data = [
                    'status_kode'           => $result['status_code'],
                    'order_id'              => $result['order_id'],
                    'transaksi_id'          => $result['transaction_id'],
                    'jumlah'                => $result['gross_amount'],
                    'tipe_transaksi'        => $result['payment_type'],
                    'wkt_transaksi'         => $result['transaction_time'],
                    'wkt_kadaluarsa'        => $result['transaction_time'],
                    'bank'                  => 'Alfa Group / Alfamart',
                    'va_numbers'            => $result['payment_code'],
                    'pdf_url'               => $result['pdf_url'],
                    'nis'                   => $nis,
                    'telp'                  => $telp,
                    'email'                 => $email,
                    'penerima'              => 'system midtrans',
                    'catatan'               => $catatan,
                ];
                $this->db->where('id', $id_tagihan);
                $simpan = $this->db->update('b_tagihan', $data);

                if ($simpan) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('siswalog/detailTagihan/' . $id_tagihan);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('siswalog/detailTagihan/' . $id_tagihan);
                }

                ##jika indomaret
            } else {
                $data = [
                    'status_kode'           => $result['status_code'],
                    'order_id'              => $result['order_id'],
                    'transaksi_id'          => $result['transaction_id'],
                    'jumlah'                => $result['gross_amount'],
                    'tipe_transaksi'       => $result['payment_type'],
                    'wkt_transaksi'         => $result['transaction_time'],
                    'wkt_kadaluarsa'        => $result['transaction_time'],
                    'bank'                  => 'Indomaret',
                    'va_numbers'            => $result['payment_code'],
                    'pdf_url'               => $result['pdf_url'],
                    'nis'                   => $nis,
                    'telp'                  => $telp,
                    'email'                 => $email,
                    'penerima'              => 'system midtrans',
                    'catatan'               => $catatan,
                ];
                $this->db->where('id', $id_tagihan);
                $simpan = $this->db->update('b_tagihan', $data);

                if ($simpan) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('siswalog/detailTagihan/' . $id_tagihan);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('siswalog/detailTagihan/' . $id_tagihan);
                }
            }

            #ShopeePay
        } elseif ($result['payment_type'] == 'qris') {
            $data = [
                'status_kode'           => $result['status_code'],
                'order_id'              => $result['order_id'],
                'transaksi_id'          => $result['transaction_id'],
                'jumlah'                => $result['gross_amount'],
                'tipe_transaksi'       => $result['payment_type'],
                'wkt_transaksi'         => $result['transaction_time'],
                'wkt_kadaluarsa'        => $result['transaction_time'],
                'bank'                  => 'ShopeePay',
                'pdf_url'               => $result['pdf_url'],
                'nis'                   => $nis,
                'telp'                  => $telp,
                'email'                 => $email,
                'penerima'              => 'system midtrans',
                'catatan'               => $catatan,
            ];
            $this->db->where('id', $id_tagihan);
            $simpan = $this->db->update('b_tagihan', $data);

            if ($simpan) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi sedang di proses, harap lakukan pembayaran sebelum jatuh tempo.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Transaksi Gagal. Coba Ulangi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('siswalog/detailTagihan/' . $id_tagihan);
            }
        }
    }
}
