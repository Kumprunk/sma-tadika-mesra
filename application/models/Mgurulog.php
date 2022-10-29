<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mgurulog extends CI_Model
{
    function guru($username)
    {
        
        $query = "SELECT c_guru.*, c_status.*, c_golongan.*,b_kelas.*,b_mapel.*
                    FROM c_guru
                    JOIN c_status ON c_guru.status_id = c_status.id
                    JOIN c_golongan ON c_guru.golongan_id = c_golongan.id
                    JOIN b_kelas ON c_guru.guru_kelas = b_kelas.kd_kelas 
                    JOIN b_mapel ON c_guru.guru_mapel = b_mapel.kd_mapel               
                    WHERE c_guru.nip = $username
                ";
        return $this->db->query($query);
    }

    function siswaRes($kelas)
    {
        $query = "SELECT b_siswa.*, b_kelas.*, b_jurusan.*, b_status_masuk.*, b_status_siswa.*, b_siswa2.*
                    FROM b_siswa
                    JOIN b_kelas ON b_siswa.kd_kelas = b_kelas.kd_kelas
                    JOIN b_jurusan ON b_siswa.kd_jurusan = b_jurusan.kd_jurusan
                    JOIN b_status_masuk ON b_siswa.kd_status_masuk = b_status_masuk.kd_status_masuk
                    JOIN b_status_siswa ON b_siswa.kd_status_siswa = b_status_siswa.kd_status_siswa
                    JOIN b_siswa2 ON b_siswa.nis = b_siswa2.nis
                    WHERE b_siswa.kd_kelas = '$kelas'
                    ORDER BY nama ASC
                ";
        return $this->db->query($query);
    }

    function nilai_res($nis)
    {
        $query = "SELECT b_nilai.*, b_siswa.*, b_mapel.*, b_semester.*
                    FROM b_nilai
                    JOIN b_siswa ON b_nilai.nis = b_siswa.nis
                    JOIN b_mapel ON b_nilai.kd_mapel = b_mapel.kd_mapel
                    JOIN b_semester ON b_nilai.kd_semester = b_semester.kd_semester
                    WHERE b_nilai.nis = $nis
                    ORDER BY b_semester.kd_semester ASC
                ";
        return $this->db->query($query);
    }


}