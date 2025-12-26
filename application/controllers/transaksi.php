<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
    }

    /* ======================
       FORM TAMBAH TRANSAKSI
       ====================== */
    public function tambah()
    {
        $data['content'] = 'backend/transaksi/t_transaksi';
        $data['judul']   = 'Form Tambah Transaksi';
        $data['konsumen'] = $this->db->get('konsumen')->result();
        $data['paket']    = $this->db->get('paket')->result();
        $data['kode_transaksi'] = $this->M_transaksi->generateKode();

        $this->load->view('backend/dashboard', $data);
    }

    /* ======================
       AJAX AMBIL HARGA PAKET
       ====================== */
    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');
        echo json_encode($this->M_transaksi->getHargaPaket($kode_paket));
    }

    /* ======================
       SIMPAN TRANSAKSI BARU
       ====================== */
    public function simpan()
    {
        $data = [
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'kode_konsumen'  => $this->input->post('kode_konsumen'),
            'kode_paket'     => $this->input->post('kode_paket'),
            'tgl_masuk'      => $this->input->post('tgl_masuk'),
            'berat'          => $this->input->post('berat'),
            'grand_total'    => $this->input->post('grand_total'),
            'bayar'          => 'Belum Lunas',
            'status'         => 'Baru'
        ];

        $this->db->insert('transaksi', $data);
        $this->session->set_flashdata('info', 'Transaksi berhasil ditambahkan');
        redirect('transaksi/tambah');
    }

    /* ======================
       RIWAYAT TRANSAKSI
       ====================== */
    public function riwayat()
    {
        $data['content'] = 'backend/transaksi/riwayat_transaksi';
        $data['judul']   = 'Riwayat Transaksi';
        $data['data']    = $this->M_transaksi->getAllRiwayat();

        $this->load->view('backend/dashboard', $data);
    }

    /* ======================
       UPDATE STATUS TRANSAKSI
       ====================== */
    public function update_status()
    {
        $kode_transaksi = $this->input->post('kt');
        $status         = $this->input->post('stt');

        if ($status == 'Selesai') {
            $data = [
                'status'    => 'Selesai',
                'bayar'     => 'Lunas',
                'tgl_ambil' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'status' => $status
            ];
        }

        $this->M_transaksi->updateStatus($kode_transaksi, $data);
    }

    /* ======================
       FORM EDIT TRANSAKSI
       ====================== */
    public function edit($kode_transaksi)
    {
        $transaksi = $this->M_transaksi->getByKode($kode_transaksi);

        // 🔒 Kunci jika sudah selesai / lunas
        if ($transaksi->status == 'Selesai' || $transaksi->bayar == 'Lunas') {
            redirect('transaksi/riwayat');
        }

        $data['content']   = 'backend/transaksi/edit_transaksi';
        $data['judul']     = 'Edit Transaksi';
        $data['transaksi'] = $transaksi;
        $data['konsumen']  = $this->db->get('konsumen')->result();
        $data['paket']     = $this->db->get('paket')->result();

        $this->load->view('backend/dashboard', $data);
    }

    /* ======================
       UPDATE HASIL EDIT
       ====================== */
    public function update()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');

        $data = [
            'kode_konsumen' => $this->input->post('kode_konsumen'),
            'kode_paket'    => $this->input->post('kode_paket'),
            'berat'         => $this->input->post('berat'),
            'grand_total'   => $this->input->post('grand_total')
        ];

        $this->M_transaksi->updateStatus($kode_transaksi, $data);
        $this->session->set_flashdata('info', 'Transaksi berhasil diperbarui');
        redirect('transaksi/riwayat');
    }
}

