<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mguru extends CI_Model
{
    function guru_res()
    {
        $query = "SELECT c_guru.*, c_status.*, c_golongan.*,b_kelas.*,b_mapel.*
                    FROM c_guru
                    JOIN c_status ON c_guru.status_id = c_status.id
                    JOIN c_golongan ON c_guru.golongan_id = c_golongan.id
                    JOIN b_kelas ON c_guru.guru_kelas = b_kelas.kd_kelas 
                    JOIN b_mapel ON c_guru.guru_mapel = b_mapel.kd_mapel               
                    ORDER BY nama ASC
                ";
        return $this->db->query($query);
    }

    function guru($nip)
    {
        $query = "SELECT c_guru.*, c_status.*, c_golongan.*,b_kelas.*,b_mapel.*
                    FROM c_guru
                    JOIN c_status ON c_guru.status_id = c_status.id
                    JOIN c_golongan ON c_guru.golongan_id = c_golongan.id
                    JOIN b_kelas ON c_guru.guru_kelas = b_kelas.kd_kelas 
                    JOIN b_mapel ON c_guru.guru_mapel = b_mapel.kd_mapel
                    WHERE nip = $nip";
        return $this->db->query($query);
    }
}
