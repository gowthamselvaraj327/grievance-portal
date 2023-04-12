<?php

namespace App\Filament\Resources\AcademicsResource\Pages;

use App\Filament\Resources\AcademicsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAcademics extends CreateRecord
{
    protected static string $resource = AcademicsResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
