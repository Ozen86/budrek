<?php

namespace App\Filament\Resources\PklisResource\Pages;

use App\Filament\Resources\PklisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPklis extends ListRecords
{
    protected static string $resource = PklisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
