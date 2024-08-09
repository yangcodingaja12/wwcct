<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
    }

    public function dashboard()
    {
        $this->session->unset_userdata('supplier');
        $this->session->unset_userdata('part');
        $this->session->unset_userdata('quantity');
        $data["table"] = $this->M_dashboard->table();
        $this->load->view('Dashboard/dashboard', $data);
    }
}
