<?php

namespace App\Filament\Resources\CancellationResource\Pages;

use App\Filament\Resources\CancellationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCancellation extends EditRecord
{
    protected static string $resource = CancellationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
