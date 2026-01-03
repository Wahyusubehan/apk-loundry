<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slider extends CI_Model {

    public function getSlider()
    {
        return $this->db->get('slider')->result();
    }

}
