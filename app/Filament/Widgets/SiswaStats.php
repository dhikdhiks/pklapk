<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Siswa;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SiswaStats extends BaseWidget
{
    protected static ?int $sort = 1;
    protected ?string $heading = '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ Stats ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━';

    protected function getStats(): array
    {
        // Total Siswa in siswas
        $totalSiswa = Siswa::count();


        // Siswa with status_lapor_pkl = TRUE
        $siswaLaporTrue = Siswa::where('status_lapor_pkl', true)->count();

        // Siswa with status_lapor_pkl = FALSE
        $siswaLaporFalse = Siswa::where('status_lapor_pkl', false)->count();

        return [
            Stat::make('Siswa PKL', $totalSiswa)
                ->description('Total Siswa yang PKL')
                ->descriptionIcon('mdi-account-hard-hat-outline', IconPosition::Before)
                ->color('primary'),
            Stat::make('Sudah Lapor', $siswaLaporTrue)
                ->description('Total Siswa yang sudah lapor')
                ->descriptionIcon('lineawesome-user-check-solid', IconPosition::Before)
                ->color('success'),
            Stat::make('Belum Lapor', $siswaLaporFalse)
                ->description('Total Siswa yang belum lapor')
                ->descriptionIcon('lineawesome-user-times-solid', IconPosition::Before)
                ->color('danger'),
        ];
}

}
