<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paket extends CI_Controller {

    public function __construct()
{
    parent::__construct();
    $this->load->model('m_paket');
}


     public function index()
     {
         $isi['content'] = 'backend/paket/v_paket.php';
         $isi['judul']   = 'Daftar Data Paket';
         $isi['data']   = $this->m_paket->getDataPaket;
         $this->load->view('backend/dasboard', $isi);
     }
    
     public function tambah()
     {
         $isi['content'] = 'backend/paket/t_paket.php';
         $isi['judul']   = 'Form Tambah Paket';
         $isi['kode_paket'] = $this->m_paket->generate_kode_paket();
         $this->load->view('backend/dasboard', $isi);
     }

     public function simpan()
  {
     $data = array(
         'kode_paket'  => $this->input->post('kode_paket'),
         'nama_paket'  => $this->input->post('nama_paket'),
         'harga_paket' => $this->input->post('harga_paket')
     );

     $query = $this->db->insert('paket', $data);

     if  ($query == TRUE) {
         $this->session->set_flashdata('info', 'Data Paket Berhasil di simpan');
         redirect('paket');
    }
  }

     public function edit($kode_paket)
  {
      $isi['content'] = 'backend/paket/e_paket';
      $isi['judul'] = 'Form Edit Paket';
      $isi['data'] = $this->m_paket->edit($kode_paket);
      $this->load->view('backend/dashboard', $isi);
  }

     public function update()
  { 
     $kode_paket = $this->input->post('kode_paket');
     $data = array(
         'kode_paket'  => $this->input->post('kode_paket'),
         'nama_paket'  => $this->input->post('nama_paket'),
         'harga_paket' => $this->input->post('harga_paket')
     );

     $query = $this->m_paket->update(kode_paket, $data);

     if  ($query == TRUE) {
         $this->session->set_flashdata('info', 'Data Paket Berhasil di update');
         redirect('paket');
    }
  }
 
     public function delete($kode_paket)
  {
   $query = $this->m_paket->delete($kode_paket);

     if  ($query == TRUE) {
         $this->session->set_flashdata('info', 'Data Paket Berhasil di delete');
         redirect('paket');
    } 
  }
}