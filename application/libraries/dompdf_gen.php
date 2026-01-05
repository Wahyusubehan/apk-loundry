<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Dompdf_gen {

    public function __construct() {
        // kosong
    }

    public function load_view($view, $data = array(), $filename = 'laporan', $paper = 'A4', $orientation = 'portrait')
    {
        $CI =& get_instance();
		$CI->load->helper('tgl_indo');
        $CI->load->view($view, $data);

        $html = $CI->output->get_output();

        $dompdf = new Dompdf(); // ⬅️ INI SEKARANG VALID
        $dompdf->setPaper($paper, $orientation);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream($filename, array("Attachment" => 0));
    }
}
