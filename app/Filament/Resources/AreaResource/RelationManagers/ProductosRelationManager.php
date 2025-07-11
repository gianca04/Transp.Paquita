<?php

namespace App\Filament\Resources\AreaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ProductosRelationManager extends RelationManager
{
    protected static string $relationship = 'productos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->label('Nombre'),

                // ...existing code...
                Tables\Columns\TextColumn::make('stock.medida')
                    ->label('Medida')
                    ->sortable()
                    ->weight(2)
                    ->formatStateUsing(fn($state) => $state ?? '-'),

                Tables\Columns\TextColumn::make('stock.cantidad')
                    ->label('Stock')
                    ->sortable()
                    ->weight(2)
                    ->formatStateUsing(fn($state) => $state !== null ? number_format($state) : '-'),
                // ...existing code...
                Tables\Columns\TextColumn::make('foto')
                    ->searchable()
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('proveedor.nombre')

                    ->sortable()
                    ->label('Proveedor')  // Etiqueta en español
                    ->icon('heroicon-o-truck')  // Icono de proveedor
                    ->weight(3),
                Tables\Columns\TextColumn::make('subArea.nombre')

                    ->sortable()
                    ->label('Subárea')  // Etiqueta en español
                    ->icon('heroicon-o-cog')  // Icono relevante para subáreas
                    ->weight(1),
            ])
            ->filters([
                //
                DateRangeFilter::make('created_at')
                    ->label('Fecha de creación'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                ]),
            ]);
    }
}
