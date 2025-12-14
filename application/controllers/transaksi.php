<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    /* =============================
       Ambil harga paket
    ============================== */
    public function getHargaPaket($kode_paket)
    {
        return $this->db
            ->where('kode_paket', $kode_paket)
            ->get('paket')
            ->row_array();
    }

    /* =============================
       Generate kode transaksi
    ============================== */
    public function generateKode()
    {
        $this->db->select('RIGHT(kode_transaksi,3) AS kode', false);
        $this->db->order_by('kode_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = (int) $data->kode + 1;
        } else {
            $kode = 1;
        }

        return str_pad($kode, 3, '0', STR_PAD_LEFT);
    }

    /* =============================
       Ambil seluruh riwayat transaksi
    ============================== */
    public function getAllRiwayat()
    {
        return $this->db
            ->select('*')
            ->from('transaksi')
            ->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left')
            ->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left')
            ->get()
            ->result();
    }
}

