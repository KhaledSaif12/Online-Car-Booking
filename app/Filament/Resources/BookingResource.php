<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              // اختيار المستخدم
              Forms\Components\Select::make('user_id')
              ->required()
              ->relationship('user', 'name')
              ->label('User'),

          // اختيار السيارة
          Forms\Components\Select::make('car_id')
              ->required()
              ->relationship('car', 'Model')
              ->label('Car'),

          // اختيار الخدمة
          Forms\Components\Select::make('service_id')
              ->required()
              ->relationship('service', 'Name')
              ->label('Service'),

          // اختيار الموقع
          Forms\Components\Select::make('location_id')
              ->required()
              ->relationship('location', 'Name')
              ->label('Location'),

          // تحديد تاريخ الحجز
          Forms\Components\DatePicker::make('Date')
              ->required()
              ->label('Booking Date'),

          // حالة الحجز
          Forms\Components\Select::make('Status')
              ->options([
                  'Pending' => 'Pending',
                  'Confirmed' => 'Confirmed',
                  'Cancelled' => 'Cancelled',
              ])
              ->label('Status'),

          // قسم الدفع
          Section::make('Payment Information')
              ->schema([
                  Forms\Components\Select::make('payment_method')
                      ->options([
                          'Credit Card' => 'Credit Card',
                          'PayPal' => 'PayPal',
                          'Cash' => 'Cash',
                      ])
                      ->label('Payment Method')
                      ->required(),

                  // إدخال مبلغ الدفع
                  Forms\Components\TextInput::make('amount')
                      ->label('Amount')
                      ->numeric()
                      ->prefix('€')
                      ->maxValue(42949672.95),
              ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('car.Brand')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.Name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location.Name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Status'),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'view' => Pages\ViewBooking::route('/{record}'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
