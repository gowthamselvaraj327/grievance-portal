<?php

namespace App\Filament\Resources\InfrastructureResource\Pages;

use App\Filament\Resources\InfrastructureResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInfrastructure extends CreateRecord
{
    protected static string $resource = InfrastructureResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
