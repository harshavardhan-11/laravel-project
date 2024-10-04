<?php

namespace App\Http\Controllers;

use Elibyy\TCPDF\Facades\TCPDF;


class TcpdfInvoiceController extends Controller {

    public function generatePDF()
    {

        $pdf = new \TCPDF(); 

        $html = view('invoice')->render();
        $pdf->AddPage();
        $pdf->writeHTML($html);

        $pdf->Output('sample_pdf.pdf', 'D');
        
    }
}