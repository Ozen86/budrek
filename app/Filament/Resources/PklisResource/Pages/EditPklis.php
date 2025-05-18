<?php

namespace App\Filament\Resources\PklisResource\Pages;

use App\Filament\Resources\PklisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPklis extends EditRecord
{
    protected static string $resource = PklisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
