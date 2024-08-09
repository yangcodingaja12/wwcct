<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function table()
    {
        $table = $this->db->get('text');
        return $table;
    }
}
