<?php

namespace App\Filament\Resources\SpdResource\Pages;

use App\Filament\Resources\SpdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpds extends ListRecords
{
    protected static string $resource = SpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
