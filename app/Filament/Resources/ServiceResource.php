<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use App\Filament\Resources\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Name')
                    ->required()
                    ->maxLength(100),
                              // اختيار الموقع
          Forms\Components\Select::make('location_id')
          ->required()
          ->relationship('location', 'Name')
          ->label('Location'),
          Forms\Components\Select::make('car_id')
          ->required()
          ->relationship('car', 'Brand')
          ->label('Car'),
                Forms\Components\MarkdownEditor::make('Description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('Price')
                ->numeric()
                ->prefix('€')
                ->maxValue(42949672.95),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location.Name')
                    ->sortable()
                    ->label('Locationcar'),
                Tables\Columns\TextColumn::make('car.Brand')
                    ->sortable()
                    ->label('Car'),
                Tables\Columns\TextColumn::make('Description')
                    ->columnSpanFull(),
                Tables\Columns\TextColumn::make('Price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
