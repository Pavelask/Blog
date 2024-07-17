<?php

namespace App\Filament\Resources\NewsModelResource\Pages;

use App\Filament\Resources\NewsModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsModel extends EditRecord
{
    protected static string $resource = NewsModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
