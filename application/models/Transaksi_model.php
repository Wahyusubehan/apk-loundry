<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    // Ambil data transaksi by tanggal
    public function getLaporan($tgl_awal, $tgl_akhir)
    {
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('transaksi')->result();
    }
}
