<?php

namespace App\Filament\Resources\GrievanceResource\Pages;

use App\Filament\Resources\GrievanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGrievance extends CreateRecord
{
    protected static string $resource = GrievanceResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
