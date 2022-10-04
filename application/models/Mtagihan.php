<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtagihan extends CI_Model
{
    function tagihan_res()
    {
        $query = "SELECT b_tagihan.*, b_siswa.*
                    FROM b_tagihan
                    JOIN b_siswa ON b_tagihan.nis = b_siswa.nis
                    ORDER BY b_tagihan.bulan ASC
                ";
        return $this->db->query($query);
    }
}
