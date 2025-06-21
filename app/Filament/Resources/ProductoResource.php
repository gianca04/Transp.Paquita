<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Referencias')
                    ->schema([
                        Forms\Components\TextInput::make('area_id')
                            ->placeholder('ID del \xC3\xA1rea')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('sub_area_id')
                            ->placeholder('ID de la sub\xC3\xA1rea')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('categoria_id')
                            ->placeholder('ID de la categor\xC3\xADa')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('marca_id')
                            ->placeholder('ID de la marca')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('proveedor_id')
                            ->placeholder('ID del proveedor')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('user_id')
                            ->placeholder('ID del usuario')
                            ->required()
                            ->numeric(),
                    ]),
                Forms\Components\Section::make('Detalles del producto')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre del producto')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('descripcion')
                            ->placeholder('Descripci\xC3\xB3n del producto')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('foto')
                            ->placeholder('URL de la foto')
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('area_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sub_area_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoria_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marca_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proveedor_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto')
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
