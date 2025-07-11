<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntradaResource\Pages;
use App\Filament\Resources\EntradaResource\RelationManagers;
use App\Models\Entrada;
use App\Models\User;
use App\Models\Producto;
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
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Notifications\Notification;
use App\Models\Stock;

class EntradaResource extends Resource
{
    protected static ?string $model = Entrada::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';
    protected static ?string $navigationGroup = 'Gestión de Inventarios y Productos';

    public static function form(Form $form): Form
    {
        return $form
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
                    ->prefixIcon('heroicon-o-cube')->placeholder('Buscar producto')
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
                    ), // Icono de cubo para el campo de ID del producto


                Forms\Components\DatePicker::make('fecha')
                    ->placeholder('Fecha de la salida')

                    ->default(now())
                    ->prefixIcon('heroicon-o-calendar'), // Icono de calendario para la fecha

                Forms\Components\TextInput::make('hora')
                    ->placeholder('Hora de salida')
                    ->required()
                    ->default(now())
                    ->prefixIcon('heroicon-o-clock'),
                Forms\Components\Select::make('tipo_documento')
                    ->label('Tipo de documento')
                    ->native(false)
                    ->required()
                    ->options(['boleta' => 'BOLETA', 'factura' => 'FACTURA', 'guia' => 'GUíA']),

                Forms\Components\TextInput::make('numero_documento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cantidad')
                    ->placeholder('Cantidad')
                    ->required()
                    ->numeric()
                    ->minValue(1) // 🔒 Valor mínimo permitido
                    ->prefixIcon('heroicon-o-plus')
                    ->helperText('Debe ser mayor a 0'), // Adding hashtag icon for quantity field

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
                    ->label('Ingresado') // Etiqueta en español
                    ->numeric()
                    ->sortable()
                    ->icon('heroicon-o-plus') // Icono (opcional)
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
                DateRangeFilter::make('created_at')
                    ->label('Fecha de creación'),
            ])
            ->headerActions([
                Action::make('entrada_masiva')
                    ->label('Entrada Masiva')
                    ->icon('heroicon-o-inbox-stack')
                    ->color('success')
                    ->modalHeading('Registrar Entrada Masiva de Productos')
                    ->modalDescription('Registra múltiples productos de un mismo cargamento de una vez.')
                    ->modalWidth('7xl')
                    ->form([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('fecha_cargamento')
                                    ->label('Fecha del Cargamento')
                                    ->required()
                                    ->default(now())
                                    ->prefixIcon('heroicon-o-calendar'),
                                    
                                Forms\Components\TimePicker::make('hora_cargamento')
                                    ->label('Hora del Cargamento')
                                    ->required()
                                    ->default(now()->format('H:i'))
                                    ->prefixIcon('heroicon-o-clock'),
                            ]),
                            
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\Select::make('tipo_documento')
                                    ->label('Tipo de Documento')
                                    ->required()
                                    ->native(false)
                                    ->options([
                                        'boleta' => 'BOLETA', 
                                        'factura' => 'FACTURA', 
                                        'guia' => 'GUÍA'
                                    ])
                                    ->prefixIcon('heroicon-o-document-text'),
                                    
                                Forms\Components\TextInput::make('numero_documento')
                                    ->label('Número de Documento')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-hashtag'),
                                    
                                Forms\Components\Select::make('proveedor_info')
                                    ->label('Proveedor (Opcional)')
                                    ->placeholder('Seleccionar proveedor')
                                    ->searchable()
                                    ->native(false)
                                    ->prefixIcon('heroicon-o-building-storefront')
                                    ->options(function () {
                                        return \App\Models\Proveedor::query()
                                            ->select('id', 'nombre')
                                            ->get()
                                            ->pluck('nombre', 'id')
                                            ->toArray();
                                    }),
                            ]),
                            
                        Forms\Components\Section::make('Productos del Cargamento')
                            ->description('Agrega todos los productos que llegaron en este cargamento')
                            ->schema([
                                Repeater::make('productos')
                                    ->schema([
                                        Forms\Components\Grid::make(3)
                                            ->schema([
                                                Forms\Components\Select::make('producto_id')
                                                    ->label('Producto')
                                                    ->required()
                                                    ->searchable()
                                                    ->native(false)
                                                    ->prefixIcon('heroicon-o-cube')
                                                    ->options(function () {
                                                        return Producto::query()
                                                            ->select('id', 'nombre', 'descripcion')
                                                            ->get()
                                                            ->mapWithKeys(function ($producto) {
                                                                return [$producto->id => $producto->nombre . ($producto->descripcion ? ' - ' . $producto->descripcion : '')];
                                                            })
                                                            ->toArray();
                                                    }),
                                                    
                                                Forms\Components\TextInput::make('cantidad')
                                                    ->label('Cantidad')
                                                    ->required()
                                                    ->numeric()
                                                    ->minValue(1)
                                                    ->prefixIcon('heroicon-o-plus')
                                                    ->placeholder('Ej: 50'),
                                                    
                                                Forms\Components\TextInput::make('observaciones')
                                                    ->label('Observaciones')
                                                    ->placeholder('Opcional')
                                                    ->maxLength(255)
                                                    ->prefixIcon('heroicon-o-chat-bubble-left-ellipsis'),
                                            ])
                                    ])
                                    ->defaultItems(1)
                                    ->minItems(1)
                                    ->maxItems(50)
                                    ->itemLabel(fn (array $state): ?string => 
                                        $state['producto_id'] 
                                            ? Producto::find($state['producto_id'])?->nombre ?? 'Producto no encontrado'
                                            : 'Nuevo producto'
                                    )
                                    ->collapsible()
                                    ->cloneable(),
                            ])
                    ])
                    ->action(function (array $data): void {
                        $userId = Auth::id();
                        $productosCreados = 0;
                        $errores = [];
                        
                        foreach ($data['productos'] as $producto) {
                            try {
                                // Crear la entrada
                                $entrada = Entrada::create([
                                    'user_id' => $userId,
                                    'producto_id' => $producto['producto_id'],
                                    'fecha' => $data['fecha_cargamento'],
                                    'hora' => $data['hora_cargamento'],
                                    'tipo_documento' => $data['tipo_documento'],
                                    'numero_documento' => $data['numero_documento'],
                                    'cantidad' => $producto['cantidad'],
                                ]);
                                
                                $productosCreados++;
                                
                            } catch (\Exception $e) {
                                $productoNombre = Producto::find($producto['producto_id'])?->nombre ?? 'Producto ID: ' . $producto['producto_id'];
                                $errores[] = "Error al procesar {$productoNombre}: " . $e->getMessage();
                            }
                        }
                        
                        if ($productosCreados > 0) {
                            Notification::make()
                                ->title('Entrada masiva registrada exitosamente')
                                ->body("Se registraron {$productosCreados} productos correctamente.")
                                ->success()
                                ->duration(5000)
                                ->send();
                        }
                        
                        if (!empty($errores)) {
                            Notification::make()
                                ->title('Algunos productos no pudieron procesarse')
                                ->body(implode('\n', array_slice($errores, 0, 3)) . (count($errores) > 3 ? '\n...' : ''))
                                ->warning()
                                ->duration(8000)
                                ->send();
                        }
                    })
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
            'index' => Pages\ListEntradas::route('/'),
            'create' => Pages\CreateEntrada::route('/create'),
            'edit' => Pages\EditEntrada::route('/{record}/edit'),
        ];
    }
}
