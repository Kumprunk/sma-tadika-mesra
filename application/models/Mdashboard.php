<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdashboard extends CI_Model
{
    function jumlah_siswa()
    {
        $this->db->select('*');
        $this->db->from('b_siswa');
        return $this->db->get()->num_rows();
    }

    function jumlah_guru()
    {
        $this->db->select('*');
        $this->db->from('c_guru');
        return $this->db->get()->num_rows();
    }

    function jumlah_users()
    {
        $this->db->select('*');
        $this->db->from('u_user');
        return $this->db->get()->num_rows();
    }

    function jumlah_kelas()
    {
        $this->db->select('*');
        $this->db->from('b_kelas');
        return $this->db->get()->num_rows();
    }

    function jumlah_jurusan()
    {
        $this->db->select('*');
        $this->db->from('b_jurusan');
        return $this->db->get()->num_rows();
    }
}
