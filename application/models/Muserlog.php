<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muserlog extends CI_Model
{
    function log_res($id)
    {
        $query = "SELECT * FROM u_user_logaktivitas WHERE user_id = $id ORDER BY datetime DESC";
        return $this->db->query($query);
    }
}
