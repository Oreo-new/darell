<?php

namespace App\Filament\Resources\EndtimeResource\Pages;

use App\Filament\Resources\EndtimeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEndtimes extends ListRecords
{
    protected static string $resource = EndtimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
