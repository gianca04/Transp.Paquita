<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalidaResource\Pages;
use App\Filament\Resources\SalidaResource\RelationManagers;
use App\Models\Salida;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalidaResource extends Resource
{
    protected static ?string $model = Salida::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('producto_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('hora')
                    ->required(),
                Forms\Components\TextInput::make('destino')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('producto_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora'),
                Tables\Columns\TextColumn::make('destino')
                    ->searchable(),
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
            'index' => Pages\ListSalidas::route('/'),
            'create' => Pages\CreateSalida::route('/create'),
            'edit' => Pages\EditSalida::route('/{record}/edit'),
        ];
    }
}
