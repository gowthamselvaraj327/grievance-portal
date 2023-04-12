<?php

namespace App\Filament\Resources\SpeciallabsResource\Pages;

use App\Filament\Resources\SpeciallabsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpeciallabs extends ListRecords
{
    protected static string $resource = SpeciallabsResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
