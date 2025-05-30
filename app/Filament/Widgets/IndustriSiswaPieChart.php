<?php

namespace App\Filament\Widgets;

use App\Models\Industri;
use Filament\Widgets\ChartWidget;

class IndustriSiswaPieChart extends ChartWidget
{
    protected static ?string $heading = 'Industri yang Dipilih Siswa';
    protected static ?int $sort = 4; // Atur posisi widget di dashboard
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Ambil data jumlah siswa per industri
        $industris = Industri::withCount('pkls')->get();

        $labels = [];
        $data = [];
        $colors = [];

        $total = $industris->sum('pkls_count');

        foreach ($industris as $industri) {
            $jumlah = $industri->pkls_count;
            $presentase = $total > 0 ? round(($jumlah / $total) * 100, 1) : 0;

            $labels[] = "{$industri->nama} ({$presentase}% - {$jumlah} siswa)";
            $data[] = $jumlah;

            // Random warna dengan fallback
            $colors[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            // $colors = ['#1e3a8a', '#dc2626'];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Siswa per Industri',
                    'data' => $data,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'x' => ['display' => false],
                'y' => ['display' => false],
            ],
        ];
    }
}
