<?php

namespace App\Filament\Resources\CancellationResource\Pages;

use App\Filament\Resources\CancellationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCancellations extends ListRecords
{
    protected static string $resource = CancellationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
