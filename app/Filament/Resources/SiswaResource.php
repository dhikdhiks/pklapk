<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'hugeicons-student-card';
    protected static ?string $navigationLabel = 'Siswa SIJA';
    protected static ?string $navigationGroup = 'Data Guru - Siswa - Industri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('nis')
                    ->required()
                    ->maxLength(5),
                FileUpload::make('user_image')
                    ->label('Foto Siswa')
                    ->directory('image')
                    ->disk('public')
                    ->image()
                    ->dehydrated(false) // jangan simpan ke siswa
->afterStateUpdated(function ($state, callable $set, $livewire) {
    $siswa = $livewire->record;
    $user = \App\Models\User::where('email', $siswa->email)->first();

    if ($user && $state) {
        // Simpan file ke folder image di disk 'public'
        $path = $state->store('image', 'public');

        // Simpan path file ke kolom 'image' di tabel users
        $user->image = $path;
        $user->save();
    }
}),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required()
                    ->native(false),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(30),
                Forms\Components\Toggle::make('status_lapor_pkl')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('No'),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->searchable(),
Tables\Columns\ImageColumn::make('user.image')
    ->disk('public')
    ->label('Foto Siswa')
    ->circular()
    ->getStateUsing(fn ($record) => $record->user?->image),

                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->getStateUsing(fn($record) => DB::selectOne("SELECT getGenderCode(?) AS label", [$record->gender])->label),
                Tables\Columns\TextColumn::make('kontak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status_lapor_pkl')
                    ->label('Status Lapor PKL')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
