<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CancelChart extends ChartWidget
{
    protected static ?string $heading = 'Order Chart Cancel';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Ambil data order per bulan dalam 1 tahun sekarang
        $currentYear = Carbon::now()->year;

        $orderData = Order::where('status', '=', 'Cancel')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Inisialisasi array dengan nilai 0 untuk setiap bulan
        $monthlyData = array_fill(1, 12, 0);

        // Isi data order ke dalam array bulanan
        foreach ($orderData as $month => $count) {
            $monthlyData[$month] = $count;
        }

        // Nama-nama bulan
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        return [
            'labels' => array_values($months),
            'datasets' => [
                [
                    'label' => 'Jumlah order',
                    'data' => array_values($monthlyData),
                    'borderColor' => '#4e73df',
                    'backgroundColor' => 'rgba(78, 115, 223, 0.1)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
