<?php

namespace App\Filament\Resources\SpeciallabsResource\Pages;

use App\Filament\Resources\SpeciallabsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeciallabs extends CreateRecord
{
    protected static string $resource = SpeciallabsResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
