<?php

namespace App\Filament\Resources\CodeSnippetResource\Pages;

use App\Filament\Resources\CodeSnippetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCodeSnippet extends EditRecord
{
    protected static string $resource = CodeSnippetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
