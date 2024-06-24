<?php

namespace App\Filament\Resources\EndtimeResource\Pages;

use App\Filament\Resources\EndtimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEndtime extends EditRecord
{
    protected static string $resource = EndtimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
