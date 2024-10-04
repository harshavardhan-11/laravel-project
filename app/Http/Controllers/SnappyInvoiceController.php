<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf;

class SnappyInvoiceController extends Controller
{
    public function generatePdf()
    {
        $html = view('invoice')->render();

        return SnappyPdf::loadHTML($html)
            ->download('snippy.pdf');
    }
}
