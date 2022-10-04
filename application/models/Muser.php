<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    function user_res()
    {
        $query = "SELECT u_user.*, u_role.role, u_active.active
                    FROM u_user
                    JOIN u_role ON u_user.role_id = u_role.id
                    JOIN u_active ON u_user.active_id = u_active.id
                    WHERE NOT username = 'root'
                    ORDER BY nama ASC
                ";
        return $this->db->query($query);
    }

    function user($username)
    {
        $query = "SELECT u_user.*, u_role.role, u_active.active
                    FROM u_user
                    JOIN u_role ON u_user.role_id = u_role.id
                    JOIN u_active ON u_user.active_id = u_active.id
                    WHERE username = $username
                ";
        return $this->db->query($query);
    }

    function aktivitasUsers()
    {
        $query = "SELECT u_user_logaktivitas.*, u_user.*
                    FROM u_user_logaktivitas
                    JOIN u_user ON u_user_logaktivitas.user_id = u_user.id
                    ORDER BY datetime DESC";
        return $this->db->query($query);
    }
}
