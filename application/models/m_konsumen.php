<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsumen extends CI_Model {
     
    public function generate_kode_konsumen()
    {
        $this->db->select('RIGHT(konsumen.kode_konsumen,3) as kode', false);
        $this->db->order_by('kode_konsumen', 'desc');
        $this->db->limit('1');
        $query = $this->db->get('konsumen');
        if($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }else{
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3,"0", STR_PAD_LEFT);
        $kodejadi = "K" .$kodemax;
        return $kodejadi;
    }

    public function getAllDatakonsumen()
    {
        return $this->db->get('konsumen')->result();
    }
} 