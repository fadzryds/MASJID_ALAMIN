<?php

namespace App\Filament\Resources\PengurusDkmResource\Pages;

use App\Filament\Resources\PengurusDkmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengurusDkms extends ListRecords
{
    protected static string $resource = PengurusDkmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
