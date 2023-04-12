<?php

namespace App\Filament\Resources\AcademicsResource\Pages;

use App\Filament\Resources\AcademicsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAcademics extends EditRecord
{
    protected static string $resource = AcademicsResource::class;
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
