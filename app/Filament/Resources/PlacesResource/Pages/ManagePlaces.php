<?php

namespace App\Filament\Resources\PlacesResource\Pages;

use App\Filament\Resources\PlacesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePlaces extends ManageRecords
{
    protected static string $resource = PlacesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
