<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOAD DOMPDF BARU
require_once APPPATH.'third_party/dompdf/autoload.inc.php';

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
    }

    public function tambah()
    {
        $data['content'] = 'backend/transaksi/t_transaksi';
        $data['judul']   = 'Form Tambah Transaksi';
        $data['konsumen'] = $this->db->get('konsumen')->result();
        $data['paket']    = $this->db->get('paket')->result();
        $data['kode_transaksi'] = $this->M_transaksi->generateKode();

        $this->load->view('backend/dashboard', $data);
    }

    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');
        echo json_encode($this->M_transaksi->getHargaPaket($kode_paket));
    }

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

    public function riwayat()
    {
        $data['content'] = 'backend/transaksi/riwayat_transaksi';
        $data['judul']   = 'Riwayat Transaksi';
        $data['data']    = $this->M_transaksi->getAllRiwayat();

        $this->load->view('backend/dashboard', $data);
    }

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

    public function edit($kode_transaksi)
    {
        $transaksi = $this->M_transaksi->getByKode($kode_transaksi);

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

    public function detail($kode_transaksi)
    {
        $data['content'] = 'backend/transaksi/detail_transaksi';
        $data['judul']   = 'Detail Transaksi';
        $data['transaksi'] = $this->M_transaksi->getByKode($kode_transaksi);

        $this->load->view('backend/dashboard', $data);
    }

    // ==========================
    // CETAK PDF (DOMPDF BARU)
    // ==========================
    public function cetak_pdf($kode_transaksi)
{
    $data['transaksi'] = $this->M_transaksi->getByKode($kode_transaksi);

    $html = $this->load->view(
        'backend/transaksi/pdf_detail_transaksi',
        $data,
        true
    );

    ob_start();

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'portrait');
    $dompdf->render();

    ob_end_clean(); // 🔥 WAJIB
    $dompdf->stream("laporan-transaksi.pdf", array("Attachment" => false));
    exit;
}
	 public function testpdf()
{
    ob_start();

    $dompdf = new DOMPDF();
    $dompdf->load_html('<h1>Dompdf versi lama berhasil</h1>');
    $dompdf->set_paper('A4', 'portrait');
    $dompdf->render();

    ob_end_clean(); // 🔥 PENTING
    $dompdf->stream("test.pdf", array("Attachment" => false));
    exit;
}

public function test_dompdf()
{
    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    ob_start();

    require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

    $dompdf = new DOMPDF();
    $dompdf->load_html('<html><body><h1>OK DOMPDF</h1></body></html>');
    $dompdf->render();

    ob_end_clean();
    $dompdf->stream("test.pdf", array("Attachment" => false));
}


}
