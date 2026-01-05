<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
		$this->load->helper('tgl_indo');    }
    public function index()
    {
        $isi['content'] = 'backend/laporan/f_laporan';
        $isi['judul']   = 'Laporan Transaksi';
        $this->load->view('backend/dashboard', $isi);
    }
    public function cetak_laporan()
{
	$this->load->library('dompdf_gen');

	 $tgl_mulai = $this->input->post('tanggal_mulai');
    $tgl_ahir  = $this->input->post('tanggal_ahir');


	if (empty($tgl_mulai) || empty($tgl_ahir)) {
        $this->session->set_flashdata('error', 'Tanggal laporan belum dipilih');
        redirect('laporan');
    }

	$tgl_mulai = date('Y-m-d', strtotime($tgl_mulai));
    $tgl_ahir  = date('Y-m-d', strtotime($tgl_ahir));
	$data['laporan'] = $this->m_laporan->get_laporan($tgl_mulai, $tgl_ahir);

    

    $this->session->set_userdata('tanggal_mulai', $tgl_mulai);
    $this->session->set_userdata('tanggal_akhir', $tgl_ahir);

    // PANGGIL DOMPDF LEWAT LIBRARY
    $this->dompdf_gen->load_view(
        'backend/laporan/cetak_laporan',
        $data,
        'Laporan_Transaksi',
        'A4',
        'landscape'
    );
}

}
