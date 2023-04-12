<?php

namespace App\Filament\Resources\speciallabsResource\Pages;

use App\Filament\Resources\speciallabsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class Editspeciallabs extends EditRecord
{
    protected static string $resource = speciallabsResource::class;
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
