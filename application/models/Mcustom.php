<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcustom extends CI_Model
{
    function general()
    {
        $query = "SELECT * FROM s_general WHERE id = 1";
        return $this->db->query($query)->row_array();
    }
}
