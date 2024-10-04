<?php

namespace App\Http\Controllers;

use niklasravnsborg\LaravelPdf\Facades\Pdf;

class NiklasravnsborgInvoiceController extends Controller
{
    public function downloadInvoice()
    {
        $data = [];

        $pdf = Pdf::loadView('invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}