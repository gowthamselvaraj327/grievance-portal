<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfrastructureResource\Pages;
use App\Models\Infrastructure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use App\Filament\Resources\InfrastructureResource\Pages\EditUser;
use App\Filament\Resources\InfrastructureResource\Pages\ListUsers;
use App\Filament\Resources\InfrastructureResource\Pages\CreateUser;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Livewire\TemporaryUploadedFile;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Radio;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class InfrastructureResource extends Resource
{
    protected static ?string $model = Infrastructure::class;


    protected static ?string $navigationGroup = 'Grievance Category';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')
                        ->maxLength(255)
                        ->default('NA')->hiddenOn('edit'),
                    TextInput::make('user-id')
                        ->maxLength(255)
                        ->default(auth()->user()->id)->disabled()->hiddenOn('edit'),
                    TextInput::make('affiliate')
                        ->maxLength(255)
                        ->default(json_encode(auth()->user()->roles()->pluck('name')))->disabled()->hiddenOn('edit'),
                    TextInput::make('subject')
                        ->maxLength(255)
                        ->required(),
                    TextArea::make('desc')
                        ->maxLength(255)
                        ->required(),
                    FileUpload::make('image'),
                    Toggle::make('is_completed')->hiddenOn('create'),
                    TextArea::make('remark')
                        ->maxLength(255)->hiddenOn('create')
                        ->required(),


                ])
            ]);
    }

    public static function table(Table $table): Table
    {
            return $table
                ->columns([

                    // TextColumn::make('name')->sortable()->searchable(),
                    TextColumn::make('id')->sortable(),
                    TextColumn::make('subject'),
                    ImageColumn::make('image'),
                    BooleanColumn::make('is_completed')->sortable(),
                    TextColumn::make('remark'),
                ])
                ->filters([
                    Filter::make('Completed')
                        ->query(fn (Builder $query): Builder => $query->where('is_completed', true)),
                    Filter::make('Un Completed')
                        ->query(fn (Builder $query): Builder => $query->where('is_completed', false)),

                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                ]);

    }

    public function getTableBulkActions()
    {
        return  [
            ExportBulkAction::make()
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->hasRole(['user'])){
            return parent::getEloquentQuery()->where('user-id', auth()->user()->id);
        }
        else {
            return parent::getEloquentQuery();
        }
    }

    public static function getRelations(): array
    {
        return [
            // PlaceRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInfrastructure::route('/'),
            'create' => Pages\CreateInfrastructure::route('/create'),
            'edit' => Pages\EditInfrastructure::route('/{record}/edit'),
        ];
    }
}
