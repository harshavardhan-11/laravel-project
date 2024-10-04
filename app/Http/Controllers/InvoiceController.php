<?php

namespace App\Http\Controllers;

use Spatie\Browsershot\Browsershot;

class InvoiceController extends Controller
{
    public function generatePdf()
    {
        $html = view('invoice')->render();

        Browsershot::html($html)
            ->format('A4')
            ->save(storage_path('app/public/invoice.pdf'));

        return response()->download(storage_path('app/public/invoice.pdf'));
    }
}
