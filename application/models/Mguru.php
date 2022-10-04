<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mguru extends CI_Model
{
    function guru_res()
    {
        $query = "SELECT c_guru.*, c_status.*, c_golongan.*
                    FROM c_guru
                    JOIN c_status ON c_guru.status_id = c_status.id
                    JOIN c_golongan ON c_guru.golongan_id = c_golongan.id                   
                    ORDER BY nama ASC
                ";
        return $this->db->query($query);
    }
}
