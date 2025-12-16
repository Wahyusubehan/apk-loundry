<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket extends CI_Model {

    // Generate kode otomatis: PK001, PK002, dst
    public function generate_kode_paket()
    {
        $this->db->select('RIGHT(paket.kode_paket,3) AS kode', false);
        $this->db->order_by('kode_paket', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('paket');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        return "PK" . $kodemax;
    }

    // Ambil semua data paket
    public function getDataPaket()
    {
        return $this->db->get('paket')->result();
    }

    // Ambil data paket berdasarkan kode_paket
    public function edit($kode_paket)
    {
        return $this->db
            ->where('kode_paket', $kode_paket)
            ->get('paket')
            ->row_array();
    }

    // Update data paket
    public function update($kode_paket, $data)
    {
        return $this->db
            ->where('kode_paket', $kode_paket)
            ->update('paket', $data);
    }

    // Hapus data paket
    public function delete($kode_paket)
    {
        return $this->db
            ->where('kode_paket', $kode_paket)
            ->delete('paket');
    }
}