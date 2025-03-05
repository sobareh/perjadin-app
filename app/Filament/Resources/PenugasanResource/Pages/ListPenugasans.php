<?php

namespace App\Filament\Resources\PenugasanResource\Pages;

use App\Filament\Resources\PenugasanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenugasans extends ListRecords
{
    protected static string $resource = PenugasanResource::class;

    protected static ?string $title = 'Daftar Penugasan Pegawai';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
