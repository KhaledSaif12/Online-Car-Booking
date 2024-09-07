<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Brand')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('Size')
                ->options([
                    'Small' => 'Small',
                    'Medium' => 'Medium',
                    'Large' => 'Large',
                    'SUV' => 'SUV',
                ]),
                Forms\Components\Select::make('Transmission')
                ->options([
                    'Manual' => 'Manual',
                    'Automatic' => 'Automatic',
                ]),
                Forms\Components\Select::make('FuelType')
                ->options([
                    'Petrol' => 'Petrol',
                    'Diesel' => 'Diesel',
                    'Electric' => 'Electric',
                ]),
                Forms\Components\TextInput::make('Seats')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('Mileage')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('PricePerDay')
                    ->numeric()
                    ->prefix('€')
                    ->maxValue(42949672.95),


                Forms\Components\FileUpload::make('ImageURL')
                    ->directory('care')
                    ->image(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Size'),
                Tables\Columns\TextColumn::make('Transmission'),
                Tables\Columns\TextColumn::make('FuelType'),
                Tables\Columns\TextColumn::make('Seats')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Mileage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PricePerDay')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('ImageURL')
                    ->square(),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'view' => Pages\ViewCar::route('/{record}'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
