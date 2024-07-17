<?php

namespace App\Filament\Resources\NewsModelResource\Pages;

use App\Filament\Resources\NewsModelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsModel extends CreateRecord
{
    protected static string $resource = NewsModelResource::class;
}
