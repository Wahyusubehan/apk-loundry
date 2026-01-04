<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
		$this->load->helper('tgl_indo_helper');    }
    public function index()
    {
        $isi['content'] = 'backend/laporan/f_laporan';
        $isi['judul']   = 'Laporan Transaksi';
        $this->load->view('backend/dashboard', $isi);
    }
    public function cetak_laporan()
{
    // 1. Bersihkan SEMUA output buffer
    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    // 2. Ambil data
    $data['laporan'] = $this->m_laporan->getLaporan();

    // 3. Render view ke HTML string
    $html = $this->load->view(
        'backend/laporan/cetak_laporan',
        $data,
        true
    );

    // 4. Load DOMPDF
    require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

    // 5. Generate PDF
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'portrait');
    $dompdf->render();

    // 6. Tampilkan PDF
    $dompdf->stream("laporan.pdf", ["Attachment" => false]);
    exit;
}





public function test()
{
    $data['laporan'] = $this->m_laporan->getLaporan();
    $this->load->view('backend/laporan/cetak_laporan', $data);
}



}
