<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function getLaporan()
    {
        $this->db->select('
            transaksi.tgl_masuk,
            transaksi.kode_transaksi,
            konsumen.nama_konsumen,
            paket.nama_paket,
            transaksi.berat,
            transaksi.grand_total,
            transaksi.status
        ');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'konsumen.kode_konsumen = transaksi.kode_konsumen');
        $this->db->join('paket', 'paket.kode_paket = transaksi.kode_paket');

        // JIKA PAKAI FILTER TANGGAL
        if ($this->session->userdata('tanggal_mulai') && $this->session->userdata('tanggal_akhir')) {
            $this->db->where('DATE(transaksi.tgl_masuk) >=', $this->session->userdata('tanggal_mulai'));
            $this->db->where('DATE(transaksi.tgl_masuk) <=', $this->session->userdata('tanggal_akhir'));
        }

        return $this->db->get()->result();
    }
}
