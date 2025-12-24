<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    // AMBIL HARGA PAKET (AJAX)
    public function getHargaPaket($kode_paket)
    {
        $this->db->where('kode_paket', $kode_paket);
        return $this->db->get('paket')->row_array();
    }

    // GENERATE NOMOR TRANSAKSI (001,002,...)
    public function generateKode()
    {
        $this->db->select('RIGHT(kode_transaksi,3) as kode', false);
        $this->db->order_by('kode_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        return str_pad($kode, 3, '0', STR_PAD_LEFT);
    }

    // RIWAYAT TRANSAKSI
    public function getAllRiwayat()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        return $this->db->get()->result();
    }
}
