<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function tambah()
    {
        $isi['content'] = 'backend/transaksi/t_transaksi.php';
        $isi['judul'] = 'Form Tambah Transaksi';

        // Ambil data dropdown konsumen & paket
        $isi['konsumen'] = $this->db->get('konsumen')->result();
        $isi['paket']    = $this->db->get('paket')->result();

        // Generate kode transaksi otomatis
        $isi['kode_transaksi'] = $this->m_transaksi->generateKode();

        // Pastikan view dashboard sesuai folder mu
        $this->load->view('backend/dashboard', $isi);
    }

    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');

        if ($kode_paket == "") {
            echo json_encode(['harga_paket' => 0]);
            return;
        }

        $data = $this->m_transaksi->getHargaPaket($kode_paket);

        echo json_encode($data);
    }
}
