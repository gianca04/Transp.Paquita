<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\SubArea;
use App\Models\User;
use Closure;
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


class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Gestión de Inventarios y Productos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Referencias')
                    ->columns(2)
                    ->schema([

                        Forms\Components\Select::make('area_id')
                            ->prefixIcon('heroicon-o-square-3-stack-3d')
                            ->label('Area') // Título para el campo 'Cliente'
                            ->options(
                                function (callable $get) {
                                    return Area::query()
                                        ->select('id', 'nombre', 'descripcion')
                                        ->when($get('search'), function ($query, $search) {
                                            $query->where('nombre', 'like', "%{$search}%")
                                                ->orWhere('descripcion', 'like', "%{$search}%");
                                        })
                                        ->get()
                                        ->mapWithKeys(function ($area) {
                                            return [$area->id => $area->nombre];
                                        })
                                        ->toArray();
                                }
                            )
                            ->searchable() // Activa la búsqueda asincrónica
                            ->reactive() // Hace el campo reactivo
                            ->afterStateUpdated(fn($state, callable $set) => $set('sub_area_id', null))
                            ->afterStateUpdated(function (callable $get, callable $set) {}),

                        Forms\Components\Select::make('sub_area_id')
                            ->prefixIcon('heroicon-m-home-modern')
                            ->label('Subárea') // Título para el campo 'Sede'
                            ->options(
                                function (callable $get) {
                                    $subareaId = $get('area_id');
                                    return SubArea::where('area_id', $subareaId)
                                        ->get()
                                        ->mapWithKeys(function ($subArea) {
                                            return [$subArea->id => $subArea->nombre];
                                        })
                                        ->toArray();
                                }
                            )
                            ->reactive()
                            ->searchable()
                            ->disabled(fn($get) => !$get('area_id')) // Deshabilita si no hay area seleccionada
                        ,


                        Forms\Components\Select::make('categoria_id')
                            ->prefixIcon('heroicon-o-tag')
                            ->label('Categoría') // Título para el campo 'Cliente'
                            ->options(
                                function (callable $get) {
                                    return Categoria::query()
                                        ->select('id', 'nombre', 'descripcion')
                                        ->when($get('search'), function ($query, $search) {
                                            $query->where('nombre', 'like', "%{$search}%")
                                                ->orWhere('descripcion', 'like', "%{$search}%");
                                        })
                                        ->get()
                                        ->mapWithKeys(function ($categoria) {
                                            return [$categoria->id => $categoria->nombre];
                                        })
                                        ->toArray();
                                }
                            )
                            ->searchable() // Activa la búsqueda asincrónica
                            ->reactive() // Hace el campo reactivo
                            //->afterStateUpdated(fn($state, callable $set) => $set('categoria_id', null))
                            ->afterStateUpdated(function (callable $get, callable $set) {}),


                        Forms\Components\Select::make('marca_id')
                            ->prefixIcon('heroicon-o-swatch')
                            ->label('Marca') // Título para el campo 'Cliente'
                            ->options(
                                function (callable $get) {
                                    return Marca::query()
                                        ->select('id', 'nombre', 'descripcion')
                                        ->when($get('search'), function ($query, $search) {
                                            $query->where('nombre', 'like', "%{$search}%")
                                                ->orWhere('descripcion', 'like', "%{$search}%");
                                        })
                                        ->get()
                                        ->mapWithKeys(function ($marca) {
                                            return [$marca->id => $marca->nombre];
                                        })
                                        ->toArray();
                                }
                            )
                            ->searchable() // Activa la búsqueda asincrónica
                            ->reactive() // Hace el campo reactivo
                            //->afterStateUpdated(fn($state, callable $set) => $set('sub_area_id', null))
                            ->afterStateUpdated(function (callable $get, callable $set) {}),



                        Forms\Components\Select::make('proveedor_id')
                            ->prefixIcon('heroicon-o-truck')
                            ->label('Proveedor') // Título para el campo 'Cliente'
                            ->options(
                                function (callable $get) {
                                    return Proveedor::query()
                                        ->select('id', 'nombre', 'email')
                                        ->when($get('search'), function ($query, $search) {
                                            $query->where('nombre', 'like', "%{$search}%")
                                                ->orWhere('email', 'like', "%{$search}%");
                                        })
                                        ->get()
                                        ->mapWithKeys(function ($proveedor) {
                                            return [$proveedor->id => $proveedor->nombre];
                                        })
                                        ->toArray();
                                }
                            )
                            ->searchable() // Activa la búsqueda asincrónica
                            ->reactive() // Hace el campo reactivo
                            //->afterStateUpdated(fn($state, callable $set) => $set('categoria_id', null))
                            ->afterStateUpdated(function (callable $get, callable $set) {}),


                        Forms\Components\Select::make('user_id')
                            ->label('Usuario')
                            ->placeholder('Usuario encargado')
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

                    ]),
                Forms\Components\Section::make('Detalles del producto')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->placeholder('Nombre del producto')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-shopping-bag'), // Icono de bolsa de compras para el nombre
                        Forms\Components\Textarea::make('descripcion')
                            ->placeholder('Descripción del producto')
                            ->columnSpanFull(), // Icono de lápiz para la descripción
                        Forms\Components\FileUpload::make('foto')
                            ->image()

                            ->directory(directory: 'uploads/productos')
                            ->previewable()
                            ->maxSize(1024) // Tamaño máximo de 1MB
                            ->imageEditor()
                            ->placeholder('URL de la foto'), // Icono de imagen para la URL de la foto
                    ]),


                Forms\Components\Section::make('Información del Stock')
                    ->relationship('stock')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('medida'),
                        Forms\Components\TextInput::make('cantidad')
                            ->required()
                            ->numeric()
                            ->minValue(1) // 🔒 Valor mínimo permitido
                            ->prefixIcon('heroicon-o-plus')
                            ->helperText('Debe ser mayor a 0'),

                        Forms\Components\TextInput::make('minimo')
                            ->required()
                            ->numeric()
                            ->minValue(1) // 🔒 Valor mínimo permitido
                            ->prefixIcon('heroicon-o-minus')
                            ->helperText('Debe ser mayor a 0'),

                        Forms\Components\TextInput::make('maximo')
                            ->required()
                            ->numeric()

                            ->minValue(1) // 🔒 Valor mínimo permitido
                            ->prefixIcon('heroicon-o-plus')
                            ->helperText('Debe ser mayor a 0'),
                    ]),
            ]);
    }

    public static function afterCreate(): Closure
    {
        return function (Producto $record) {
            // Crear stock vacío si no existe
            $record->stock()->create([
                'medida' => '',
                'cantidad' => 0,
                'minimo' => 0,
                'maximo' => 0,
            ]);
        };
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->label('Nombre'),  // Etiqueta en español

                Tables\Columns\TextColumn::make('area.nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Área')  // Etiqueta en español
                    // Icono relevante para áreas
                    ->weight(1),  // Peso prioritario

                Tables\Columns\TextColumn::make('subarea.nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Subárea')  // Etiqueta en español
                    ->icon('heroicon-o-cog')  // Icono relevante para subáreas
                    ->weight(1),

                Tables\Columns\TextColumn::make('categoria.nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Categoría')  // Etiqueta en español
                    ->weight(2),


                Tables\Columns\TextColumn::make('stock.medida')
                    ->label('Medida')
                    ->sortable()
                    ->weight(2),

                Tables\Columns\TextColumn::make('stock.cantidad')
                    ->label('Stock')
                    ->formatStateUsing(fn($state) => number_format($state))
                    ->sortable()
                    ->weight(2),

                Tables\Columns\TextColumn::make('stock.minimo')
                    ->label('Mínimo')
                    ->formatStateUsing(fn($state) => number_format($state))
                    ->badge()
                    ->color('danger')
                    ->sortable()
                    ->weight(2),

                Tables\Columns\TextColumn::make('stock.maximo')
                    ->label('Máximo')
                    ->formatStateUsing(fn($state) => number_format($state))
                    ->badge()
                    ->color('primary')
                    ->sortable()
                    ->weight(2),

                Tables\Columns\TextColumn::make('marca.nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Marca')  // Etiqueta en español
                    ->icon('heroicon-o-tag')  // Icono de marca
                    ->weight(3),

                Tables\Columns\TextColumn::make('proveedor.nombre')
                    ->numeric()
                    ->sortable()
                    ->label('Proveedor')  // Etiqueta en español
                    ->icon('heroicon-o-truck')  // Icono de proveedor
                    ->weight(3),

                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->label('Usuario')  // Etiqueta en español
                    ->icon('heroicon-o-user')  // Icono de usuario
                    ->weight(4),

                Tables\Columns\ImageColumn::make('foto')
                    ->searchable()
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Creado en'),  // Etiqueta en español
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Actualizado en'),  // Etiqueta en español
            ])
            ->filters([
                //
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
