<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalidaResource\Pages;
use App\Filament\Resources\SalidaResource\RelationManagers;
use App\Models\Producto;
use App\Models\Salida;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class SalidaResource extends Resource
{
    protected static ?string $model = Salida::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-start-on-rectangle';

    protected static ?string $navigationGroup = 'Gestión de Inventarios y Productos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Datos de la salida')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Usuario')
                            ->placeholder('Usuario encargado')
                            ->required()
                            ->disabled()
                            ->native(false)
                            ->prefixIcon('heroicon-o-user')
                            ->default(fn() => Auth::user()?->id)
                            ->options(
                                function (callable $get) {
                                    return User::query()
                                        ->select('id', 'name', 'nombre', 'apellido', 'numero_documento')
                                        ->when($get('search'), function ($query, $search) {
                                            $query->where('name', 'like', "%{$search}%")
                                                ->orWhere('nombre', 'like', "%{$search}%")
                                                ->orWhere('apellido', 'like', "%{$search}%")
                                                ->orWhere('numero_documento', 'like', "%{$search}%");
                                        })
                                        ->get()
                                        ->mapWithKeys(function ($user) {
                                            return [$user->id => $user->full_name];
                                        })
                                        ->toArray();
                                }
                            ), // Icono de usuario para el campo de ID de usuario

                        Forms\Components\Select::make('producto_id')
                            ->label('Producto')
                            ->placeholder('Información del producto')
                            ->prefixIcon('heroicon-o-cube')->placeholder('ID de usuario')
                            ->required()
                            ->reactive()
                            ->searchable()
                            ->native(false)
                            ->options(
                                function (callable $get) {
                                    return Producto::query()
                                        ->select('id', 'nombre', 'descripcion')
                                        ->when($get('search'), function ($query, $search) {
                                            $query->where('nombre', 'like', "%{$search}%")
                                                ->orWhere('descripcion', 'like', "%{$search}%");
                                        })
                                        ->get()
                                        ->mapWithKeys(function ($producto) {
                                            return [$producto->id => $producto->nombre];
                                        })
                                        ->toArray();
                                }
                            )
                            , // Icono de cubo para el campo de ID del producto


                        Forms\Components\TextInput::make('cantidad')
                            ->placeholder('Cantidad')
                            ->required()
                            ->numeric()
                            ->minValue(1) // 🔒 Valor mínimo permitido
                            ->helperText('Debe ser mayor a 0')
                            ->prefixIcon('heroicon-o-minus'), // Adding hashtag icon for quantity field

                        Forms\Components\DatePicker::make('fecha')
                            ->placeholder('Fecha de la salida')

                            ->default(now())
                            ->prefixIcon('heroicon-o-calendar'), // Icono de calendario para la fecha

                        Forms\Components\TextInput::make('hora')
                            ->placeholder('Hora de salida')
                            ->required()
                            ->default(now())
                            ->prefixIcon('heroicon-o-clock'), // Adding clock icon for time field

                        Forms\Components\TextInput::make('destino')
                            ->placeholder('Destino de la mercancía')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-map-pin'), // Adding location marker icon for destination field
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.full_name')
                    ->label('Responsable') // Etiqueta en español
                    ->sortable()
                    ->icon('heroicon-s-user') // Icono (opcional)
                    ->weight(1), // Peso de la columna

                Tables\Columns\TextColumn::make('producto.nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Producto') // Etiqueta en español
                    ->icon('heroicon-o-cube'),

                Tables\Columns\TextColumn::make('cantidad')
                    ->label('Retirado') // Etiqueta en español
                    ->numeric()
                    ->sortable()
                    ->icon('heroicon-o-minus') // Icono (opcional)
                    ->weight(3), // Peso de la columna

                Tables\Columns\TextColumn::make('producto.stock.cantidad')
                    ->numeric()
                    ->sortable()
                    ->label('Cantidad total') // Etiqueta en español
                    ->icon('heroicon-o-cube'),

                Tables\Columns\TextColumn::make('fecha')
                    ->label('Fecha') // Etiqueta en español
                    ->date()
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->icon('heroicon-s-calendar') // Icono (opcional)
                    ->weight(4), // Peso de la columna

                Tables\Columns\TextColumn::make('hora')
                    ->label('Hora') // Etiqueta en español
                    ->sortable()
                    ->weight(5), // Peso de la columna

                Tables\Columns\TextColumn::make('destino')
                    ->label('Destino') // Etiqueta en español
                    ->searchable()
                    ->icon('heroicon-o-map-pin') // Icono (opcional)
                    ->weight(6), // Peso de la columna

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación') // Etiqueta en español
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight(7), // Peso de la columna

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización') // Etiqueta en español
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight(8), // Peso de la columna
            ])
            ->filters([
                DateRangeFilter::make('created_at')
                    ->label('Fecha de creación'),
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
                    ExportBulkAction::make()
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
