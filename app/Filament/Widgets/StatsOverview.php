<?php

namespace App\Filament\Widgets;

use App\Models\Donasi;
use App\Models\pengeluaran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Ambil total donasi tunai & transfer dari tabel donasi
        $pemasukanTunai = Donasi::PemasukanTunai()->sum('nominal');
        $pemasukanTransfer = Donasi::PemasukanTransfer()->sum('nominal');

        // Misal: Total pengeluaran (kalau sudah ada tabel/modelnya), sementara 0 dulu
        $totalPengeluaran = Pengeluaran::sum('nominal');

        // Total seluruh pemasukan
        $totalPemasukan = $pemasukanTunai + $pemasukanTransfer;

        // Selisih = Total Donasi - Pengeluaran
        $selisih = $totalPemasukan - $totalPengeluaran;

        return [
            Stat::make('Total Donasi Uang Tunai', 'Rp ' . number_format($pemasukanTunai, 0, ',', '.')),
            Stat::make('Total Donasi Transfer', 'Rp ' . number_format($pemasukanTransfer, 0, ',', '.')),
            Stat::make('Total Donasi Keseluruhan', 'Rp ' . number_format($totalPemasukan, 0, ',', '.')),
            Stat::make('Total Pengeluaran', 'Rp ' . number_format($totalPengeluaran, 0, ',', '.')),
            Stat::make('Selisih', 'Rp ' . number_format($selisih, 0, ',', '.')),
        ];
    }
}