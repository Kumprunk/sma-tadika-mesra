<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login/index');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $segment = $ci->uri->segment(1);

        $qcontrollers = $ci->db->get_where('u_controllers', ['controllers' => $segment])->row_array();
        $controllers = $qcontrollers['id'];
        $access = $ci->db->get_where('u_access', ['role_id' => $role_id, 'controllers_id' => $controllers])->row_array();

        if (empty($access)) {
            redirect('login/blocked403');
        }
    }
}
