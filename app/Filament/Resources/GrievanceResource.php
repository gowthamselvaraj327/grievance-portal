<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GrievanceResource\Pages;
use App\Filament\Resources\GrievanceResource\RelationManagers;
use App\Models\Grievance;
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
use App\Filament\Resources\GrievanceResource\Pages\EditUser;
use App\Filament\Resources\GrievanceResource\Pages\ListUsers;
use App\Filament\Resources\GrievanceResource\Pages\CreateUser;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Filament\Resources\GrievanceResource\RelationManagers\PlacesRelationManager;
use Filament\Forms\Components\Textarea;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class GrievanceResource extends Resource
{
    protected static ?string $model = Grievance::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')
                        ->maxLength(255)
                        ->default('NA'),
                    TextInput::make('rollno')
                        ->maxLength(255)
                        ->default('NA'),
                    Select::make('dept')
                        ->relationship('places', 'name')
                        ->preload()
                        ->required(),
                    TextInput::make('subject')
                        ->maxLength(255)
                        ->required(),
                    TextArea::make('desc')
                        ->maxLength(255)
                        ->required(),
                        SpatieMediaLibraryFileUpload::make('image')->collection('images')
                            ->required(),
                        Toggle::make('is_completed')->hiddenOn('create'),



                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('places.name')->sortable()->searchable(),
                TextColumn::make('subject')->sortable(),
                SpatieMediaLibraryImageColumn::make('image')->collection('images'),
                BooleanColumn::make('is_completed')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PlacesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrievances::route('/'),
            'create' => Pages\CreateGrievance::route('/create'),
            'edit' => Pages\EditGrievance::route('/{record}/edit'),
        ];
    }
}
