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

    // Ambil HTML view sebagai STRING
    $html = $CI->load->view($view, $data, TRUE);

    $dompdf = new Dompdf();
    $dompdf->setPaper($paper, $orientation);
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream($filename, array("Attachment" => 0));
}

}
