<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Industri;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOther extends BaseWidget
{
    protected static ?int $sort = 2;
    /**
     * Get the stats for the widget.
     *
     * @return array<Stat>
     */
    protected function getStats(): array
        {
            // Total Siswa in siswas
            $totalGuru = Guru::count();
            $industris = Industri::count();

            return [
                Stat::make('Guru Pembimbing', $totalGuru)
                    ->description('Total Guru Pembimbing')
                    ->descriptionIcon('mdi-account-hard-hat-outline', IconPosition::Before)
                    ->color('primary'),
                Stat::make('Industri PKL', $industris)
                    ->description('Total Industri PKL')
                    ->descriptionIcon('vaadin-workplace', IconPosition::Before)
                    ->color('primary'),
            ];
    }

    }
