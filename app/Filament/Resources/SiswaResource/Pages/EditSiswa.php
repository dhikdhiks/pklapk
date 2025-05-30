<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\User;

class EditSiswa extends EditRecord
{
    protected static string $resource = SiswaResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Kalau ada foto yang diupload
        if (isset($data['foto'])) {
            $user = User::where('email', $data['email'])->first();
            if ($user) {
                $user->image = $data['foto']; // 'foto' is path string uploaded by Filament FileUpload
                $user->save();
            }
        }
        return $data;
    }
}
