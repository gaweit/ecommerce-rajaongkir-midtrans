<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function __invoke(Order $order)
    {
        return Pdf::loadView('pdf', ['record' => $order])
            ->download($order->kode . '.pdf');
    }
}
