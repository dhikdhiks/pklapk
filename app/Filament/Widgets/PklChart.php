<?php

namespace App\Filament\Widgets;

use App\Models\Siswa;
use Filament\Widgets\ChartWidget;

class PklChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Lapor PKL';
    protected static ?int $sort = 3;
    protected static ?string $maxHeight = '300px';



    protected function getData(): array
    {
        $total = Siswa::count();
        $sudahLapor = Siswa::where('status_lapor_pkl', true)->count();
        $belumLapor = Siswa::where('status_lapor_pkl', false)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Laporan PKL',
                    'data' => [$sudahLapor, $belumLapor],
                    'backgroundColor' => ['#10B981', '#EF4444'], // Hijau & Merah
                ],
            ],
            'labels' => [
                'Sudah Lapor (' . round(($sudahLapor / $total) * 100, 1) . '% - ' . $sudahLapor . ' siswa)',
                'Belum Lapor (' . round(($belumLapor / $total) * 100, 1) . '% - ' . $belumLapor . ' siswa)',
            ],
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
