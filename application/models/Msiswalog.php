<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msiswalog extends CI_Model
{
    function siswa($username)
    {
        $query = "SELECT b_siswa.*, b_kelas.*, b_jurusan.*, b_status_masuk.*, b_status_siswa.*, b_siswa2.*, b_orangtua.*
                    FROM b_siswa
                    JOIN b_kelas ON b_siswa.kd_kelas = b_kelas.kd_kelas
                    JOIN b_jurusan ON b_siswa.kd_jurusan = b_jurusan.kd_jurusan
                    JOIN b_status_masuk ON b_siswa.kd_status_masuk = b_status_masuk.kd_status_masuk
                    JOIN b_status_siswa ON b_siswa.kd_status_siswa = b_status_siswa.kd_status_siswa
                    JOIN b_siswa2 ON b_siswa.nis = b_siswa2.nis
                    JOIN b_orangtua ON b_siswa.nis = b_orangtua.nis
                    WHERE b_siswa.nis = $username
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

    function tagihan_res($nis)
    {
        $query = "SELECT b_tagihan.*, b_siswa.*
                    FROM b_tagihan
                    JOIN b_siswa ON b_tagihan.nis = b_siswa.nis
                    WHERE b_tagihan.nis = $nis
                    ORDER BY b_tagihan.bulan ASC
                ";
        return $this->db->query($query);
    }

    function tagihan($id)
    {
        $query = "SELECT b_tagihan.*, b_siswa.nama
                    FROM b_tagihan
                    JOIN b_siswa ON b_tagihan.nis = b_siswa.nis
                    WHERE b_tagihan.id = $id
               ";
        return $this->db->query($query);
    }
}
