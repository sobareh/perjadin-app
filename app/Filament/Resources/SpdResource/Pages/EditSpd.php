<?php

namespace App\Filament\Resources\SpdResource\Pages;

use App\Filament\Resources\SpdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpd extends EditRecord
{
    protected static string $resource = SpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
