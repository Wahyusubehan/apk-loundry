<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_slider');
    }

    public function index()
    {
        $isi['content'] = 'backend/slider/v_slider';
        $isi['judul']   = 'Daftar Slider';
        $isi['slider']  = $this->m_slider->getSlider();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/slider/t_slider';
        $isi['judul']   = 'Form Tambah Slider';
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan()
    {
        $config['upload_path']   = './assets/images/slider/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_slider')) {
            $file = $this->upload->data();
            $gambar = $file['file_name'];
        } else {
            echo $this->upload->display_errors();
            die();
        }

        $data = array(
            'judul_slider'     => $this->input->post('judul_slider'),
            'deskripsi_slider' => $this->input->post('deskripsi_slider'),
            'gambar_slider'    => $gambar,
            'status_slider'    => $this->input->post('status_slider')
        );

        $query = $this->db->insert('slider', $data);

        if ($query == true) {
            $this->session->set_flashdata('info', 'Data Berhasil di Simpan');
            redirect('slider', 'refresh');
        }
    }


}
