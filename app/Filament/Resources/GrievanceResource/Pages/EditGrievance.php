<?php

namespace App\Filament\Resources\GrievanceResource\Pages;

use App\Filament\Resources\GrievanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrievance extends EditRecord
{
    protected static string $resource = GrievanceResource::class;
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
