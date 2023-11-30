<?php

namespace App\Filament\Resources\SectionArticleResource\Pages;

use App\Filament\Resources\SectionArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionArticle extends EditRecord
{
    protected static string $resource = SectionArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
