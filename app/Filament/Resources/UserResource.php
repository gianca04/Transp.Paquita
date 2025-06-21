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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos del usuario')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->placeholder('Nombre de usuario')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('Correo electr\xC3\xB3nico')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->placeholder('Fecha de verificaci\xC3\xB3n'),
                        Forms\Components\TextInput::make('password')
                            ->placeholder('Contrase\xC3\xB1a')
                            ->password()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('apellido')
                            ->placeholder('Apellido')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tipo_documento')
                            ->placeholder('Tipo de documento'),
                        Forms\Components\TextInput::make('numero_documento')
                            ->placeholder('N\xC3\xBAmero de documento')
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_documento'),
                Tables\Columns\TextColumn::make('numero_documento')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
