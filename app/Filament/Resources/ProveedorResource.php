<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProveedorResource\Pages;
use App\Filament\Resources\ProveedorResource\RelationManagers;
use App\Models\Proveedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Termwind\Actions\StyleToMethod;

class ProveedorResource extends Resource
{
    protected static ?string $model = Proveedor::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $pluralLabel = 'Proveedores';

    protected static ?string $modelLabel = 'Proveedor';

    protected static ?string $navigationGroup = 'Proveedores y Usuarios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos del proveedor')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre del proveedor')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-user'), // Adding a prefix icon for "Nombre del proveedor"

                        Forms\Components\TextInput::make('telefono')
                            ->placeholder('Teléfono de contacto')
                            ->tel()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-phone'), // Adding a phone icon

                        Forms\Components\TextInput::make('direccion')
                            ->placeholder('Dirección del proveedor')
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-map-pin'), // Adding a location icon

                        Forms\Components\TextInput::make('email')
                            ->placeholder('Correo electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-envelope-open'), // Adding an email icon

                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre') // Etiqueta en español
                    ->searchable()
                    ->icon('heroicon-s-user') // Icono relacionado
                    ->weight(1), // Peso de la columna

                Tables\Columns\TextColumn::make('telefono')
                    ->label('Teléfono') // Etiqueta en español
                    ->searchable()
                    ->icon('heroicon-s-phone') // Icono relacionado
                    ->weight(2), // Peso de la columna

                Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección') // Etiqueta en español
                    ->searchable()
                    ->icon('heroicon-s-home') // Icono relacionado
                    ->weight(3), // Peso de la columna

                Tables\Columns\TextColumn::make('email')
                    ->label('Correo Electrónico') // Etiqueta en español
                    ->searchable()
                    ->weight(4), // Peso de la columna

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación') // Etiqueta en español
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight(5), // Peso de la columna

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización') // Etiqueta en español
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight(6), // Peso de la columna


            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye')
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil-square')
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
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
            'index' => Pages\ListProveedors::route('/'),
            'create' => Pages\CreateProveedor::route('/create'),
            'edit' => Pages\EditProveedor::route('/{record}/edit'),
        ];
    }
}
