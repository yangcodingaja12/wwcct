<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function cek($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }

    public function login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
