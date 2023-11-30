<?php

namespace App\Filament\Resources\SectionArticleResource\Pages;

use App\Filament\Resources\SectionArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionArticles extends ListRecords
{
    protected static string $resource = SectionArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
