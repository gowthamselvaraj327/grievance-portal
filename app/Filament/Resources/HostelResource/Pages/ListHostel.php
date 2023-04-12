<?php

namespace App\Filament\Resources\HostelResource\Pages;

use App\Filament\Resources\HostelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHostel extends ListRecords
{
    protected static string $resource = HostelResource::class;
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
