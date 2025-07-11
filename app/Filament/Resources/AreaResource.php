<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaResource\Pages;
use App\Filament\Resources\AreaResource\RelationManagers;
use App\Filament\Resources\AreaResource\RelationManagers\ProductosRelationManager;
use App\Models\Area;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;
    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'Logística y Áreas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Área')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre del área')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-s-users'), // Icono agregado para más claridad
                        Forms\Components\Textarea::make('descripcion')
                            ->placeholder('Descripción del área')
                            ->maxLength(255), // Icono agregado


                    ]),
                Forms\Components\Section::make('Información de las Subareas')
                    ->columns(1)
                    ->schema([Forms\Components\Repeater::make('subAreas')

                        ->relationship('subAreas')
                        ->createItemButtonLabel('Agregar subcliente')
                        ->columns(2)
                        ->collapsible()
                        ->grid(1)
                        ->addActionLabel('Nuevo')
                        ->schema([
                            Forms\Components\TextInput::make('nombre')
                                ->required(),
                            Forms\Components\Textarea::make('descripcion'),
                        ]),])
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
                    ->label('Fecha de Creación') // Etiqueta en español
                    ->icon('heroicon-o-calendar'), // Icono de calendario

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Fecha de Actualización') // Etiqueta en español
                    ->icon('heroicon-o-refresh'), // Icono de actualización

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->label('Nombre') // Etiqueta en español
                , // Icono de nombre (puedes cambiarlo según lo que prefieras)

                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable()
                    ->label('Descripción') // Etiqueta en español
                , // Icono de descripción (puedes cambiarlo según lo que prefieras)
            ])

            ->filters([
                //
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
        ProductosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAreas::route('/'),
            'create' => Pages\CreateArea::route('/create'),
            'edit' => Pages\EditArea::route('/{record}/edit'),
        ];
    }
}
