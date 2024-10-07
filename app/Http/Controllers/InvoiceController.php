<?php

namespace App\Http\Controllers;

use Spatie\Browsershot\Browsershot;

class InvoiceController extends Controller
{
    public function generatePdf()
    {
        $html = view('allCharts')->render();

        Browsershot::html($html)
            ->format('A4')
            ->setDelay(1000)  
            ->save(storage_path('app/public/invoice.pdf'));

        return response()->download(storage_path('app/public/invoice.pdf'));
    }
}
