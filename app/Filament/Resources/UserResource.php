<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $pluralLabel = 'Usuarios';

    protected static ?string $modelLabel = 'Usuario';
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'Proveedores y Usuarios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos del usuario')
                    ->columns(2)
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->label('Nombre de ususario')
                            ->placeholder('Nombre de usuario')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('Correo')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required(fn($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                            ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->label('Contraseña'),
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('apellido')
                            ->placeholder('Apellido')
                            ->maxLength(255),
                        Forms\Components\Select::make('tipo_documento')
                            ->placeholder('Tipo de documento')
                            ->options([
                                'DNI' => 'DNI',
                                'RUC' => 'RUC',
                                'Pasaporte' => 'Carnet de Extranjería',
                            ]),
                        Forms\Components\TextInput::make('numero_documento')

                            ->label('Número de documento de documento')
                            ->maxLength(255),
                        Forms\Components\Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // Se agrega un ícono general a la tabla, puedes usar el que necesites
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nombre')
                    ->icon('heroicon-o-user'), // Icono para esta columna
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('Correo Electrónico'), // Icono para esta columna

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->label('Nombre')
                    ->icon('heroicon-o-identification'), // Icono para esta columna
                Tables\Columns\TextColumn::make('apellido')
                    ->searchable()
                    ->label('Apellido')
                    ->icon('heroicon-o-user-circle'), // Icono para esta columna
                Tables\Columns\TextColumn::make('tipo_documento')
                    ->label('Tipo de Documento')
                    ->icon('heroicon-o-document'), // Icono para esta columna
                Tables\Columns\TextColumn::make('numero_documento')
                    ->searchable()
                    ->label('Número de Documento')
                    ->icon('heroicon-o-identification'), // Icono para esta columna
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Fecha de Creación'), // Icono para esta columna
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Fecha de Actualización')
                    ->icon('heroicon-o-refresh'), // Icono para esta columna
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
