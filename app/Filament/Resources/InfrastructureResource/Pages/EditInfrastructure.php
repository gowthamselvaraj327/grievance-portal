<?php

namespace App\Filament\Resources\InfrastructureResource\Pages;

use App\Filament\Resources\InfrastructureResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfrastructure extends EditRecord
{
    protected static string $resource = InfrastructureResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
