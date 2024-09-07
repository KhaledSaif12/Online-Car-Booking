<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CancellationResource\Pages;
use App\Filament\Resources\CancellationResource\RelationManagers;
use App\Models\Cancellation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CancellationResource extends Resource
{
    protected static ?string $model = Cancellation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('booking_id')
                ->required()
                ->relationship('booking', 'Status')
                ->label('booking'),
                Forms\Components\DatePicker::make('CancellationDate')
                    ->required(),
                Forms\Components\TextInput::make('RefundAmount')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CancellationDate')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('RefundAmount')
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
            'index' => Pages\ListCancellations::route('/'),
            'create' => Pages\CreateCancellation::route('/create'),
            'view' => Pages\ViewCancellation::route('/{record}'),
            'edit' => Pages\EditCancellation::route('/{record}/edit'),
        ];
    }
}
