<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Models\OtoritasOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CetakController extends Controller
{
    public function __invoke(OtoritasOrder $order)
    {
        return Pdf::loadView('cetak', ['record' => $order])
            ->download($order->nama . '.pdf');
    }
}