<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;

class DompdfInvoiceController extends Controller
{
    public function generateInvoice()
    {
        $data = []; 

        $pdf = Pdf::loadView('invoice', $data);
        
        return $pdf->download('invoice.pdf');
    }

}