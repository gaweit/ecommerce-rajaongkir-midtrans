<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;
    protected static ?string $pollingInterval = '15s';
    protected static bool $isLazy = true;
    protected function getStats(): array
    {
        return [
            Stat::make('', User::count())
                ->description('Total Pelanggan Terdaftar')
                ->color('success'),
            Stat::make('', Produk::count())
                ->description('Total Produk')
                ->color('warning'),
            Stat::make('', Order::count())
                ->description('Total Semua Status Order')
                ->color('warning'),
        ];
    }
}
