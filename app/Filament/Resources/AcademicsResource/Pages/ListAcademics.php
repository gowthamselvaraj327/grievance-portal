<?php

namespace App\Filament\Resources\AcademicsResource\Pages;

use App\Filament\Resources\AcademicsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademics extends ListRecords
{
    protected static string $resource = AcademicsResource::class;
    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function export()
    {
        $query = $this->getFilteredTableQuery();
        $this->applySortingToTableQuery($query);

        $users = $query->get();

        $filename = now()->format('Y-m-d_his').'-users.xlsx';

        return Excel::download(new UsersExport($users), $filename);
    }
}
