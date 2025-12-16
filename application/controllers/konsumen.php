<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konsumen');
    }

    public function index()
    {
        $isi['content'] = 'backend/konsumen/v_konsumen';
        $isi['judul']   = 'Data Konsumen';
        $isi['data'] =$this->m_konsumen->getAllDatakonsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/konsumen/t_konsumen';
        $isi['judul']   = 'Form Tambah Konsumen';
        $isi['kode_konsumen'] = $this->m_konsumen->generate_kode_konsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'kode_konsumen'   => $this->input->post('kode_konsumen'),
            'nama_konsumen'   => $this->input->post('nama_konsumen'),
            'alamat_konsumen' => $this->input->post('alamat_konsumen'),
            'no_telp'         => $this->input->post('no_telp'),
        );

        $query = $this->db->insert('konsumen', $data);

        if ($query) {
            $this->session->set_flashdata('info', 'Data Konsumen Berhasil Disimpan');
            redirect('konsumen');
        }
    }
}
