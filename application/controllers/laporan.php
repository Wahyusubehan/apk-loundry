<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }
    public function index()
    {
        $isi['content'] = 'backend/laporan/f_laporan';
        $isi['judul']   = 'Laporan Transaksi';
        $this->load->view('backend/dashboard', $isi);
    }
    public function cetak_laporan()
    {
        $tgl_mulai = $this->input->post('tanggal_mulai');
        $tgl_akhir = $this->input->post('tanggal_akhir');
        $isi['laporan'] = $this->m_laporan->filter_laporan($tgl_mulai, $tgl_akhir);
		var_dump($isi['laporan']);
        $this->load->view('backend/laporan/cetak_laporan');
    }
}
