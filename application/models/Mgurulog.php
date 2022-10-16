<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mgurulog extends CI_Model
{
    function guru($username)
    {
        $query = "SELECT * FROM c_guru
                  WHERE nip = $username";
        return $this->db->query($query);
    }


}