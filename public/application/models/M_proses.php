<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_proses extends CI_Model
{
    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function cek($supplier, $part)
    {
        $this->db->where('supplier', $supplier);
        $this->db->where('part', $part);
        return $this->db->get('text');
    }
    public function cek2($supplier)
    {
        $this->db->where('supplier', $supplier);
        
        return $this->db->get('text');
    }
    public function cek3($part)
    {
        $this->db->where('part', $part);
        
        return $this->db->get('text');
    }
    public function cek4($supplier)
    {
        $query = "SELECT part FROM text WHERE supplier = '$supplier'";
        $result = $this->db->query($query);
        return $result;
    }
    public function cek5($part)
    {
        $query = "SELECT supplier FROM text WHERE part = '$part'";
        $result = $this->db->query($query);
        return $result;
    }

    public function get_data3()
    {
        // $this->db->from('sementara')
        // ->order_by('id',"desc")
        // ->limit(1)
        // ->get()
        // ->row();
        // //$this->db->select("*")->limit(1)->order_by('id',"DESC")->get("sementara")->result();
        $this->load->database();
        $last = $this->db->order_by('id', "desc")
            ->limit(1)
            ->get('sementara')
            ->result();
        return ($last);
    }


    function save($datasensor)
    {
        $this->db->insert('sementara', $datasensor);
        return TRUE;
    }






















    // public function get_data1($id)
    // {
    //     return
    //         $this->db->from('sensor')
    //         ->where('sensor.id_user =', $this->session->userdata('id'))
    //         ->where('sensor.id_sensor =', $id)
    //         ->get()
    //         ->result();
    // }

    // public function get_data2($id)
    // {
    //     return
    //         $this->db->from('sensor')
    //         ->where('sensor.id_sensor =', $id)
    //         ->get()
    //         ->result();
    // }
    // public function get_data3()
    // {
    //     // $this->db->from('perencanaan')
    //     // $last = $this->db->fromorder_by('id',"desc")
    //     // ->limit(1)
    //     // ->get('data_sensor')
    //     // ->row();
    //     $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("sementara")->row();
    // }
    // function save($datasensor)
    // {
    // 	$this->db->insert('sementara', $datasensor);
    // 	return TRUE;
    // }
}
