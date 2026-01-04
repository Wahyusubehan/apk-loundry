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

	public function edit($id_slider)
{
	$isi['content'] = 'backend/slider/e_slider';
	$isi['judul'] = 'Form Edit Slider';
	$isi['slider'] = $this->m_slider->edit_slider($id_slider);
	$this->load->view('backend/dashboard', $isi);
}

public function update()

{

		$id_slider=$this->input->post('id_slider'); 
		$config['upload_path'] = 'assets/images/slider'; 
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

	if (!empty($_FILES['gambar_slider']['name'])) { 
		$this->upload->do_upload('gambar_slider'); 
		$upload = $this->upload->data();
		$gambar = $upload['file_name'];
		$data = array(
         'gambar_slider' => $gambar , 
		 'judul_slider' => $this->input->post('judul_slider'),
		 'deskripsi_slider' => $this->input->post('deskripsi_slider'),
		 'status_slider' => $this->input->post('status_slider')
		);
		$_id= $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
	   $query = $this->m_slider->update($id_slider, $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Update');
			unlink('assets/images/slider/'.$_id->gambar_slider);
			redirect('slider','refresh');
	   }
	}else{
		$data = array(
		 'judul_slider' => $this->input->post('judul_slider'),
		 'deskripsi_slider' => $this->input->post('deskripsi_slider'),
		 'status_slider' => $this->input->post('status_slider')
		);
		$query = $this->m_slider->update($id_slider, $data);
		if ($query = true) {
			$this->session->set_flashdata('info', 'Data Berhasil di Update');
			redirect('slider','refresh');
	   }
	}

  }

  public function delete($id_slider)
{
    $_id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
    $query = $this->db->delete('slider', ['id_slider' => $id_slider]);

    if ($query = true) {
        unlink('assets/images/slider/' . $_id->gambar_slider);
        $this->session->set_flashdata('info', 'Data Berhasil di Delete');
        redirect('slider', 'refresh');
    }
}


}
