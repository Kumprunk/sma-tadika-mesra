<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function data_siswaAll()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswaRes'] = $this->Msiswa->siswaRes()->result_array();

        $data['title'] = 'Data Siswa';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/data_siswaAll', $data);
        $this->load->view('temp/footer', $data);
    }

    public function siswaAdd()
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswaRes'] = $this->Msiswa->siswaRes()->result_array();
        $data['l_kelas'] = $this->db->get('b_kelas')->result_array();
        $data['l_jurusan'] = $this->db->get('b_jurusan')->result_array();
        $data['l_status_masuk'] = $this->db->get('b_status_masuk')->result_array();
        $data['l_status_siswa'] = $this->db->get('b_status_siswa')->result_array();
        $data['l_golda'] = $this->db->get('l_golda')->result_array();
        $data['l_agama'] = $this->db->get('l_agama')->result_array();
        $data['l_kecamatan'] = $this->db->get('l_kecamatan')->result_array();
        $data['l_kabupaten'] = $this->db->get('l_kabupaten')->result_array();
        $data['l_provinsi'] = $this->db->get('l_provinsi')->result_array();
        $data['l_negara'] = $this->db->get('l_negara')->result_array();
        $data['l_pendidikan'] = $this->db->get('l_pendidikan')->result_array();
        $data['l_pekerjaan'] = $this->db->get('l_pekerjaan')->result_array();
        $data['l_penghasilan'] = $this->db->get('l_penghasilan')->result_array();

        #DATA KESISWAAN
        $this->form_validation->set_rules('nis', 'nis', 'trim|required|is_unique[b_siswa.nis]');
        $this->form_validation->set_rules('nisn', 'nisn', 'trim|is_unique[b_siswa.nis]|numeric|min_length[10]');
        $this->form_validation->set_rules('kd_kelas', 'kd_kelas', 'trim|required');
        $this->form_validation->set_rules('kd_jurusan', 'kd_jurusan', 'trim|required');
        $this->form_validation->set_rules('kd_status_masuk', 'kd_status_masuk', 'trim|required');
        $this->form_validation->set_rules('kd_status_siswa', 'kd_status_siswa', 'trim|required');
        $this->form_validation->set_rules('tgl_daftar', 'tgl_daftar', 'trim|required');
        #DATA PRIBADI SISWA
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|min_length[16]|max_length[16]|numeric|is_unique[b_siswa.nik]');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('tmp_lhr', 'tmp_lhr', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tgl_lhr', 'trim|required');
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
        #DATA PENDIDIKAN SEBELUMNYA
        $this->form_validation->set_rules('asal_sekolah', 'asal_sekolah', 'trim');
        $this->form_validation->set_rules('no_skhu', 'no_skhu', 'trim');
        $this->form_validation->set_rules('no_ijazah', 'no_ijazah', 'trim');
        $this->form_validation->set_rules('nilai_un', 'nilai_un', 'trim|numeric|min_length[2]|max_length[2]');
        #DATA SISWA PINDAHAN
        $this->form_validation->set_rules('pindah_dari_sekolah', 'pindah_dari_sekolah', 'trim');
        $this->form_validation->set_rules('tgl_pindah', 'tgl_pindah', 'trim');
        $this->form_validation->set_rules('alasan_pindah', 'alasan_pindah', 'trim|max_length[50]');
        #DATA AYAH
        $this->form_validation->set_rules('nama_ayah', 'nama_ayah', 'trim');
        $this->form_validation->set_rules('status_ayah', 'status_ayah', 'trim');
        $this->form_validation->set_rules('pendidikan_ayah', 'pendidikan_ayah', 'trim');
        $this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'trim');
        $this->form_validation->set_rules('penghasilan_ayah', 'penghasilan_ayah', 'trim');
        $this->form_validation->set_rules('telp_ayah', 'telp_ayah', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_ayah', 'email_ayah', 'trim|valid_email');
        #DATA IBU
        $this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'trim');
        $this->form_validation->set_rules('status_ibu', 'status_ibu', 'trim');
        $this->form_validation->set_rules('pendidikan_ibu', 'pendidikan_ibu', 'trim');
        $this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan_ibu', 'trim');
        $this->form_validation->set_rules('penghasilan_ibu', 'penghasilan_ibu', 'trim');
        $this->form_validation->set_rules('telp_ibu', 'telp_ibu', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_ibu', 'email_ibu', 'trim|valid_email');
        #DATA WALI
        $this->form_validation->set_rules('nama_wali', 'nama_wali', 'trim');
        $this->form_validation->set_rules('status_wali', 'status_wali', 'trim');
        $this->form_validation->set_rules('pendidikan_wali', 'pendidikan_wali', 'trim');
        $this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan_wali', 'trim');
        $this->form_validation->set_rules('penghasilan_wali', 'penghasilan_wali', 'trim');
        $this->form_validation->set_rules('telp_wali', 'telp_wali', 'trim|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_wali', 'email_wali', 'trim|valid_email');
        #DATA ORANGTUA
        $this->form_validation->set_rules('alamat_orangtua', 'alamat_orangtua', 'trim|max_length[50]');
        $this->form_validation->set_rules('kel_orangtua', 'kel_orangtua', 'trim');
        $this->form_validation->set_rules('kec_orangtua', 'kec_orangtua', 'trim');
        $this->form_validation->set_rules('kab_orangtua', 'kab_orangtua', 'trim');
        $this->form_validation->set_rules('prov_orangtua', 'prov_orangtua', 'trim');
        $this->form_validation->set_rules('negara_orangtua', 'negara_orangtua', 'trim');
        $this->form_validation->set_rules('kodepos_orangtua', 'kodepos_orangtua', 'trim|min_length[5]|max_length[5]|numeric');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Siswa Baru';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('siswa/siswaAdd', $data);
            $this->load->view('temp/footer', $data);
        } else {
            #insert b_siswa
            $insertSiswa = [
                #DATA KESISWAAN
                'nis'                       => htmlspecialchars($this->input->post('nis', true)),
                'nisn'                      => htmlspecialchars($this->input->post('nisn', true)),
                'kd_kelas'                  => htmlspecialchars($this->input->post('kd_kelas', true)),
                'kd_jurusan'                => htmlspecialchars($this->input->post('kd_jurusan', true)),
                'tgl_daftar'                => htmlspecialchars($this->input->post('tgl_daftar', true)),
                'kd_status_masuk'           => htmlspecialchars($this->input->post('kd_status_masuk', true)),
                'kd_status_siswa'           => htmlspecialchars($this->input->post('kd_status_siswa', true)),
                'foto'                      => 'default.png',
                #DATA PRIBADI SISWA
                'nama'                      => htmlspecialchars($this->input->post('nama', true)),
                'nik'                       => htmlspecialchars($this->input->post('nik', true)),
                'jk'                        => htmlspecialchars($this->input->post('jk', true)),
                'tmp_lhr'                   => htmlspecialchars($this->input->post('tmp_lhr', true)),
                'tgl_lhr'                   => htmlspecialchars($this->input->post('tgl_lhr', true)),
                'golda'                     => htmlspecialchars($this->input->post('golda', true)),
                'agama'                     => htmlspecialchars($this->input->post('agama', true)),
                'alamat'                    => htmlspecialchars($this->input->post('alamat', true)),
                'kel'                       => htmlspecialchars($this->input->post('kel', true)),
                'kec'                       => htmlspecialchars($this->input->post('kec', true)),
                'kab'                       => htmlspecialchars($this->input->post('kab', true)),
                'prov'                      => htmlspecialchars($this->input->post('prov', true)),
                'negara'                    => htmlspecialchars($this->input->post('negara', true)),
                'kodepos'                   => htmlspecialchars($this->input->post('kodepos', true)),
                'email'                     => htmlspecialchars($this->input->post('email', true)),
                'telp'                      => htmlspecialchars($this->input->post('telp', true)),
            ];
            $this->db->insert('b_siswa', $insertSiswa);

            #insert b_siswa2
            $insertSiswa2 = [
                'nis'                       => htmlspecialchars($this->input->post('nis', true)),
                #DATA PENDIDIKAN SEBELUMNYA
                'asal_sekolah'              => htmlspecialchars($this->input->post('asal_sekolah', true)),
                'no_skhu'                   => htmlspecialchars($this->input->post('no_skhu', true)),
                'no_ijazah'                 => htmlspecialchars($this->input->post('no_ijazah', true)),
                'nilai_un'                  => htmlspecialchars($this->input->post('nilai_un', true)),
                #DATA SISWA PINDAHAN
                'pindah_dari_sekolah'       => htmlspecialchars($this->input->post('pindah_dari_sekolah', true)),
                'tgl_pindah'                => htmlspecialchars($this->input->post('tgl_pindah', true)),
                'alasan_pindah'             => htmlspecialchars($this->input->post('alasan_pindah', true)),
            ];
            $this->db->insert('b_siswa2', $insertSiswa2);

            #insert b_orangtua
            $insertOrangtua = [
                'nis'                       => htmlspecialchars($this->input->post('nis', true)),
                #DATA AYAH
                'nama_ayah'                 => htmlspecialchars($this->input->post('nama_ayah', true)),
                'status_ayah'               => htmlspecialchars($this->input->post('status_ayah', true)),
                'pendidikan_ayah'           => htmlspecialchars($this->input->post('pendidikan_ayah', true)),
                'pekerjaan_ayah'            => htmlspecialchars($this->input->post('pekerjaan_ayah', true)),
                'penghasilan_ayah'          => htmlspecialchars($this->input->post('penghasilan_ayah', true)),
                'telp_ayah'                 => htmlspecialchars($this->input->post('telp_ayah', true)),
                'email_ayah'                => htmlspecialchars($this->input->post('email_ayah', true)),
                #DATA IBU
                'nama_ibu'                 => htmlspecialchars($this->input->post('nama_ibu', true)),
                'status_ibu'               => htmlspecialchars($this->input->post('status_ibu', true)),
                'pendidikan_ibu'           => htmlspecialchars($this->input->post('pendidikan_ibu', true)),
                'pekerjaan_ibu'            => htmlspecialchars($this->input->post('pekerjaan_ibu', true)),
                'penghasilan_ibu'          => htmlspecialchars($this->input->post('penghasilan_ibu', true)),
                'telp_ibu'                 => htmlspecialchars($this->input->post('telp_ibu', true)),
                'email_ibu'                => htmlspecialchars($this->input->post('email_ibu', true)),
                #DATA WALI
                'nama_wali'                 => htmlspecialchars($this->input->post('nama_wali', true)),
                'status_wali'               => htmlspecialchars($this->input->post('status_wali', true)),
                'pendidikan_wali'           => htmlspecialchars($this->input->post('pendidikan_wali', true)),
                'pekerjaan_wali'            => htmlspecialchars($this->input->post('pekerjaan_wali', true)),
                'penghasilan_wali'          => htmlspecialchars($this->input->post('penghasilan_wali', true)),
                'telp_wali'                 => htmlspecialchars($this->input->post('telp_wali', true)),
                'email_wali'                => htmlspecialchars($this->input->post('email_wali', true)),
                #DATA ORANGTUA
                'alamat_orangtua'           => htmlspecialchars($this->input->post('alamat_orangtua', true)),
                'kel_orangtua'              => htmlspecialchars($this->input->post('kel_orangtua', true)),
                'kec_orangtua'              => htmlspecialchars($this->input->post('kec_orangtua', true)),
                'kab_orangtua'              => htmlspecialchars($this->input->post('kab_orangtua', true)),
                'prov_orangtua'             => htmlspecialchars($this->input->post('prov_orangtua', true)),
                'negara_orangtua'           => htmlspecialchars($this->input->post('negara_orangtua', true)),
                'kodepos_orangtua'          => htmlspecialchars($this->input->post('kodepos_orangtua', true)),
            ];
            $this->db->insert('b_orangtua', $insertOrangtua);

            #insert u_user
            $insertUser = [
                'username'          => htmlspecialchars($this->input->post('nis', true)),
                'nama'              => htmlspecialchars($this->input->post('nama', true)),
                'password'          => htmlspecialchars(password_hash($this->input->post('nis'), PASSWORD_DEFAULT)),
                'email'             => htmlspecialchars($this->input->post('email', true)),
                'role_id'           => 3,
                'active_id'         => 1,
                'date_created'      => date('Y-m-d H:i:s'),
                'date_update'       => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('u_user', $insertUser);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">siswa baru berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('siswa/siswaAdd');
        }
    }



    public function profilSiswa($nis)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswa->siswa($nis)->row_array();

        $data['title'] = $data['siswa']['nis'] . ' - ' . $data['siswa']['nama'];
        $data['title2'] = 'Profil';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/topbar', $data);
        $this->load->view('siswa/profilSiswa', $data);
        $this->load->view('temp/footer', $data);
    }

    public function biodataSiswa($nis)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswa->siswa($nis)->row_array();

        $data['title'] = $data['siswa']['nis'] . ' - ' . $data['siswa']['nama'];
        $data['title2'] = 'Biodata';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/topbar', $data);
        $this->load->view('siswa/biodataSiswa', $data);
        $this->load->view('temp/footer', $data);
    }

    public function orangtuaSiswa($nis)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswa->siswa($nis)->row_array();

        $data['title'] = $data['siswa']['nis'] . ' - ' . $data['siswa']['nama'];
        $data['title2'] = 'Data Orang Tua';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/topbar', $data);
        $this->load->view('siswa/orangtuaSiswa', $data);
        $this->load->view('temp/footer', $data);
    }

    public function transkripnilaiSiswa($nis)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswa->siswa($nis)->row_array();
        $data['nilai_res'] = $this->Msiswa->nilai_res($data['siswa']['nis'])->result_array();

        $data['title'] = $data['siswa']['nis'] . ' - ' . $data['siswa']['nama'];
        $data['title2'] = 'Transkrip Nilai';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/topbar', $data);
        $this->load->view('siswa/transkripnilaiSiswa', $data);
        $this->load->view('temp/footer', $data);
    }

    public function tagihansppSiswa($nis)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['siswa'] = $this->Msiswa->siswa($nis)->row_array();
        $data['tagihan_res'] = $this->Msiswa->tagihan_res($data['siswa']['nis'])->result_array();

        $data['title'] = $data['siswa']['nis'] . ' - ' . $data['siswa']['nama'];
        $data['title2'] = 'Tagihan SPP';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/topbar', $data);
        $this->load->view('siswa/tagihansppSiswa', $data);
        $this->load->view('temp/footer', $data);
    }

    public function detailTagihan($id)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['tagihan'] = $this->Msiswa->tagihan($id)->row_array();

        $data['title'] = 'Detail Tagihan';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/navbar', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('siswa/detailTagihan', $data);
        $this->load->view('temp/footer', $data);
    }

    public function bayarCash($id)
    {
        $data['userLog'] = $this->db->get_where('u_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['general'] = $this->Mcustom->general();
        $data['tagihan'] = $this->Msiswa->tagihan($id)->row_array();

        $this->form_validation->set_rules('email', 'email', 'trim|valid_email');
        $this->form_validation->set_rules('telp', 'telp', 'trim|numeric|max_length[15]|min_length[10]');
        $this->form_validation->set_rules('catatan', 'catatan', 'trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Bayar Cash Tunai';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/navbar', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('siswa/bayarCash', $data);
            $this->load->view('temp/footer', $data);
        } else {
            $dataUpdate = [
                'nis'               => htmlspecialchars($data['tagihan']['nis'], true),
                'status_kode'       => 1,
                'order_id'          => '-',
                'transaksi_id'      => '-',
                'jumlah'            => htmlspecialchars($data['tagihan']['jml_tagihan'], true),
                'tipe_transaksi'    => 'Cash / Tunai',
                'wkt_transaksi'     => date('Y-m-d H:i:s'),
                'wkt_kadaluarsa'    => '-',
                'va_numbers'        => '-',
                'biller_code'       => '-',
                'email'             => htmlspecialchars($this->input->post('email', true)),
                'telp'              => htmlspecialchars($this->input->post('telp', true)),
                'penerima'          => htmlspecialchars($this->input->post('penerima', true)),
                'catatan'           => htmlspecialchars($this->input->post('catatan', true)),
            ];
            $this->db->where('id', $id);
            $this->db->update('b_tagihan', $dataUpdate);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Transaksi berhasil.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('siswa/detailTagihan/' . $id);
        }
    }
}
