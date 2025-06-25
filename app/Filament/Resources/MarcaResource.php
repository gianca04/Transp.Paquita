<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarcaResource\Pages;
use App\Filament\Resources\MarcaResource\RelationManagers;
use App\Models\Marca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarcaResource extends Resource
{
    protected static ?string $model = Marca::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $navigationGroup = 'Gestión de Inventarios y Productos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos de la marca')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre de la marca') // Placeholder text
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-swatch'), // Prefix icon (you can adjust the icon based on your need)

                        Forms\Components\Textarea::make('descripcion')
                            ->placeholder('Descripción de la marca') // Placeholder text
                            ->maxLength(255), // Prefix icon (adjust the icon accordingly)
                    ]),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Fecha de creación') // Etiqueta en español
                    ->icon('heroicon-o-clock') // Icono (puedes elegir el que necesites)
                    ->weight(1), // Peso para la columna

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Fecha de actualización') // Etiqueta en español
                    ->icon('heroicon-o-refresh') // Icono (puedes elegir el que necesites)
                    ->weight(1), // Peso para la columna

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->label('Nombre') // Etiqueta en español
                    ->icon('heroicon-o-identification') // Icono (puedes elegir el que necesites)
                    ->weight(2), // Peso para la columna

                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable()
                    ->label('Descripción') // Etiqueta en español
                    ->icon('heroicon-o-document-text') // Icono (puedes elegir el que necesites)
                    ->weight(2), // Peso para la columna
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
            'index' => Pages\ListMarcas::route('/'),
            'create' => Pages\CreateMarca::route('/create'),
            'edit' => Pages\EditMarca::route('/{record}/edit'),
        ];
    }
}
