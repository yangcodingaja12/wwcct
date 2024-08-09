<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_proses');
    }

    public function input1()
    {
        $this->load->view('Proses/input1');
    }

    public function letak()
    {
        $this->load->view('Proses/letak');
    }

    public function input2()
    {
        $data['sementara'] = $this->M_proses->get_data3();

        $this->load->view('Proses/input2', $data);
    }

    public function sessiondata()
    {
        $supplier1 = $this->input->post('supplier');
        $part1 = $this->input->post('part');
        $quantity1 = $this->input->post('quantity');
        $supplier = trim($supplier1);
        $part = trim($part1);
        $quantity = trim($quantity1);
        $data['supplier'] = $supplier;
        $data['part'] = $part;
        $data['quantity'] = $quantity;
        $this->session->set_userdata($data);

        $cek = $this->M_proses->cek($this->session->userdata('supplier'), $this->session->userdata('part'));
        $cek2 = $this->M_proses->cek2($this->session->userdata('supplier'));
        $cek3 = $this->M_proses->cek3($this->session->userdata('part'));
        $cek4 = $this->M_proses->cek4($this->session->userdata('supplier'));
        $cek5 = $this->M_proses->cek5($this->session->userdata('part'));
        if ($cek->num_rows() == 1) {
            foreach ($cek->result() as $row) {
                $data['session_id'] = $row->id;
                $data['session_supplier'] = $row->supplier;
                $data['session_part'] = $row->part;
                $this->session->set_userdata($data);
            }

            if ($this->session->userdata('session_supplier') == $this->session->userdata('supplier') && $this->session->userdata('session_part') == $this->session->userdata('part')) {
                $this->session->set_userdata('status', 'update');
            } else {
                $this->session->set_userdata('status', 'create');
            }
        } else {
            $this->session->set_userdata('status', 'create');
        }
        redirect('Proses/letak');
    }

    public function cekdata()
    {
        $supplier1 = $this->input->post('supplier');
        $part1 = $this->input->post('part');
        $supplier = trim($supplier1);
        $part = trim($part1);

        $cek = $this->M_proses->cek($supplier, $part);
        $cek2 = $this->M_proses->cek2($supplier);
        $cek3 = $this->M_proses->cek3($part);
        $cek4 = $this->M_proses->cek4($supplier);
        $cek5 = $this->M_proses->cek5($part);

        foreach ($cek->result() as $row) {
            $cek_supplier = $row->supplier;
            $cek_part = $row->part;
        }
        if ($cek->num_rows() == 1) {
            if ($cek_supplier == $supplier && $cek_part == $part) {
                echo "There is data based on the Supplier Name & Part Number, <br> Do you want to continue?";
            } else {
                echo "Are you sure to create the new dataELSEATAS?";
            }
        } else if ($cek2->num_rows() == 1) {
            // echo "There is data based on the Supplier Name & Unknown Part Number, <br> Do you want to continue2?";
            if ($cek4->num_rows() == 1) {
                echo "There is data based on the Supplier Name <br> Do you want to continue to create new data ?";
            }
        } else if ($cek3->num_rows() == 1) {
            // echo "There is data based on the Supplier Name & Unknown Part Number, <br> Do you want to continue2?";
            if ($cek5->num_rows() == 1) {
                echo "There is data based on the Part Number <br> Do you want to continue to create new data?";
            }
        } else {
            echo "Are you sure to create the new data?";
        }
    }

    public function saveupdatedata()
    {
        $data = array(
            'supplier' => $this->session->userdata('supplier'),
            'part' => $this->session->userdata('part'),
            'quantity' => $this->session->userdata('quantity'),
            'length' => $this->input->post('length'),
            'width' => $this->input->post('width'),
            'height' => $this->input->post('height'),
            'volume' => $this->input->post('volume'),
            'weight' => $this->input->post('weight'),
        );

        if ($this->session->userdata('status') == 'update') {
            $this->M_proses->update_data('text', $data, $this->session->userdata('session_id'));
            echo "Data successfully updated.";
        } else if ($this->session->userdata('status') == 'create') {
            $this->M_proses->insert_data('text', $data);
            echo "Data successfully saved.";
        }
    }

    public function sensor()
    {
        $this->load->model('M_proses');
        if (isset($_GET['data'])) {
            //echo "OK";
            $panjang = $this->input->get('data');
             $lebar = $this->input->get('data2');
             $tinggi = $this->input->get('data3');
             $berat = $this->input->get('data4');
            //echo $panjang;

            $datasensor = array(
                'data_sensor' => $panjang,
                'data_sensor2' => $lebar,
                'data_sensor3' => $tinggi,
                'data_sensor4' => $berat,
                'waktu' => time()
            );

            if ($this->M_proses->save($datasensor)) {
                echo "BERHASIL";
            } else {
                echo "ERROR";
            }
        } else {
            echo "Variabel data tidak terdefinisi";
        }
    }

    // public function savedata()
    // {
    //     $data = array(
    //         'supplier' => $this->session->userdata('supplier'),
    //         'part' => $this->session->userdata('part'),
    //         'quantity' => $this->session->userdata('quantity'),
    //         'length' => $this->input->post('length'),
    //         'width' => $this->input->post('width'),
    //         'height' => $this->input->post('height'),
    //         'volume' => $this->input->post('volume'),
    //         'weight' => $this->input->post('weight'),
    //     );

    //     $this->M_proses->insert_data('text', $data);
    //     redirect('Dashboard/dashboard');
    // }

    // public function updatedata()
    // {
    //     $data = array(
    //         'supplier' => $this->session->userdata('supplier'),
    //         'part' => $this->session->userdata('part'),
    //         'quantity' => $this->session->userdata('quantity'),
    //         'length' => $this->input->post('length'),
    //         'width' => $this->input->post('width'),
    //         'height' => $this->input->post('height'),
    //         'volume' => $this->input->post('volume'),
    //         'weight' => $this->input->post('weight'),
    //     );

    //     $this->M_proses->update_data('text', $data, $this->session->userdata('cek_id'));
    //     redirect('Dashboard/dashboard');
    // }
}
