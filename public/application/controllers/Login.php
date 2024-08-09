<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('Login/login');
    }
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->library("session");
        $this->load->helper('url');
        $this->load->model('M_login');
    }

    public function ceklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->M_login->cek($username, $password);
        if ($cek->num_rows() == 1) {

            foreach ($cek->result() as $row) {
                $sess_data['id_user'] = $row->id;
                $sess_data['username'] = $row->username;
                $this->session->set_userdata($sess_data);
            }

            if ($this->session->userdata('username') == $username) {
                redirect('Dashboard/dashboard');
            } elseif ($this->session->userdata('username') == '') {
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password salah.');
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
