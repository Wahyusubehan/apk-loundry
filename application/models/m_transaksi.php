<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    /* ======================
       AMBIL HARGA PAKET (AJAX)
       ====================== */
    public function getHargaPaket($kode_paket)
    {
        return $this->db
            ->get_where('paket', ['kode_paket' => $kode_paket])
            ->row_array();
    }

    /* ======================
       GENERATE KODE TRANSAKSI
       ====================== */
    public function generateKode()
    {
        $this->db->select('RIGHT(kode_transaksi,3) as kode', false);
        $this->db->order_by('kode_transaksi','DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');

        $kode = ($query->num_rows() > 0)
            ? intval($query->row()->kode) + 1
            : 1;

        return str_pad($kode, 3, '0', STR_PAD_LEFT);
    }

    /* ======================
       RIWAYAT TRANSAKSI
       ====================== */
    public function getAllRiwayat()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen','transaksi.kode_konsumen = konsumen.kode_konsumen','left');
        $this->db->join('paket','transaksi.kode_paket = paket.kode_paket','left');
        return $this->db->get()->result();
    }

    /* ======================
       AMBIL 1 TRANSAKSI (EDIT)
       ====================== */
    public function getByKode($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get()->row();
    }

    /* ======================
       UPDATE STATUS / EDIT
       ====================== */
    public function updateStatus($kode_transaksi, $data)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->update('transaksi', $data);
    }

}
