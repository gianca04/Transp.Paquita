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
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Notifications\Notification;
use App\Models\Stock;

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
                            
                        Forms\Components\Select::make('tipo_despacho')
                            ->label('Tipo de Despacho')
                            ->placeholder('Seleccionar tipo de despacho')
                            ->native(false)
                            ->options([
                                'envio_cliente' => 'Envío a Cliente',
                                'transferencia' => 'Transferencia entre Almacenes',
                                'devolucion' => 'Devolución a Proveedor',
                                'merma' => 'Merma o Pérdida',
                                'otros' => 'Otros'
                            ])
                            ->prefixIcon('heroicon-o-truck'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.Full_Name')
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

                Tables\Columns\TextColumn::make('tipo_despacho')
                    ->label('Tipo de Despacho')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'envio_cliente' => 'success',
                        'transferencia' => 'info',
                        'devolucion' => 'warning',
                        'merma' => 'danger',
                        'otros' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'envio_cliente' => 'Envío a Cliente',
                        'transferencia' => 'Transferencia',
                        'devolucion' => 'Devolución',
                        'merma' => 'Merma',
                        'otros' => 'Otros',
                        default => 'N/A',
                    })
                    ->sortable()
                    ->weight(7),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación') // Etiqueta en español
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight(8), // Peso de la columna

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización') // Etiqueta en español
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight(9), // Peso de la columna
            ])
            ->filters([
                DateRangeFilter::make('created_at')
                    ->label('Fecha de creación'),
            ])
            ->headerActions([
                Action::make('salida_masiva')
                    ->label('Salida Masiva')
                    ->icon('heroicon-o-truck')
                    ->color('warning')
                    ->modalHeading('Registrar Salida Masiva de Productos')
                    ->modalDescription('Registra múltiples productos para un mismo despacho o envío.')
                    ->modalWidth('7xl')
                    ->form([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('fecha_despacho')
                                    ->label('Fecha del Despacho')
                                    ->required()
                                    ->default(now())
                                    ->prefixIcon('heroicon-o-calendar'),
                                    
                                Forms\Components\TimePicker::make('hora_despacho')
                                    ->label('Hora del Despacho')
                                    ->required()
                                    ->default(now()->format('H:i'))
                                    ->prefixIcon('heroicon-o-clock'),
                            ]),
                            
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('destino_principal')
                                    ->label('Destino Principal')
                                    ->required()
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-map-pin')
                                    ->placeholder('Ej: Almacén Central, Cliente ABC'),
                                    
                                Forms\Components\Select::make('tipo_despacho')
                                    ->label('Tipo de Despacho')
                                    ->required()
                                    ->native(false)
                                    ->options([
                                        'envio_cliente' => 'Envío a Cliente',
                                        'transferencia' => 'Transferencia entre Almacenes',
                                        'devolucion' => 'Devolución a Proveedor',
                                        'merma' => 'Merma o Pérdida',
                                        'otros' => 'Otros'
                                    ])
                                    ->prefixIcon('heroicon-o-truck'),
                            ]),
                            
                        Forms\Components\TextArea::make('observaciones_generales')
                            ->label('Observaciones Generales')
                            ->placeholder('Información adicional sobre este despacho')
                            ->maxLength(500)
                            ->rows(3)
                            ->columnSpanFull(),
                            
                        Forms\Components\Section::make('Productos del Despacho')
                            ->description('Agrega todos los productos que salen en este despacho')
                            ->schema([
                                Repeater::make('productos')
                                    ->schema([
                                        Forms\Components\Grid::make(4)
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
                                                    })
                                                    ->afterStateUpdated(function ($state, callable $set) {
                                                        if ($state) {
                                                            $producto = Producto::with('stock')->find($state);
                                                            $stockDisponible = $producto?->stock?->cantidad ?? 0;
                                                            $set('stock_disponible', $stockDisponible);
                                                        }
                                                    }),
                                                    
                                                Forms\Components\TextInput::make('cantidad')
                                                    ->label('Cantidad a Retirar')
                                                    ->required()
                                                    ->numeric()
                                                    ->minValue(1)
                                                    ->prefixIcon('heroicon-o-minus')
                                                    ->placeholder('Ej: 25')
                                                    ->reactive()
                                                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                                        $stockDisponible = $get('stock_disponible') ?? 0;
                                                        if ($state && $state > $stockDisponible) {
                                                            $set('cantidad', $stockDisponible);
                                                        }
                                                    }),
                                                    
                                                Forms\Components\TextInput::make('stock_disponible')
                                                    ->label('Stock Disponible')
                                                    ->disabled()
                                                    ->prefixIcon('heroicon-o-cube')
                                                    ->placeholder('0')
                                                    ->dehydrated(false),
                                                    
                                                Forms\Components\TextInput::make('destino_especifico')
                                                    ->label('Destino Específico')
                                                    ->placeholder('Opcional - si difiere del principal')
                                                    ->maxLength(255)
                                                    ->prefixIcon('heroicon-o-map-pin'),
                                            ])
                                    ])
                                    ->defaultItems(1)
                                    ->minItems(1)
                                    ->maxItems(50)
                                    ->itemLabel(fn (array $state): ?string => 
                                        $state['producto_id'] 
                                            ? (Producto::find($state['producto_id'])?->nombre ?? 'Producto no encontrado') . 
                                              (isset($state['cantidad']) ? ' (Cantidad: ' . $state['cantidad'] . ')' : '')
                                            : 'Nuevo producto'
                                    )
                                    ->collapsible()
                                    ->cloneable(),
                            ])
                    ])
                    ->action(function (array $data): void {
                        $userId = Auth::id();
                        $productosProcessados = 0;
                        $errores = [];
                        $advertencias = [];
                        
                        foreach ($data['productos'] as $producto) {
                            try {
                                // Verificar stock disponible
                                $productoModel = Producto::with('stock')->find($producto['producto_id']);
                                $stockDisponible = $productoModel?->stock?->cantidad ?? 0;
                                
                                if ($producto['cantidad'] > $stockDisponible) {
                                    $advertencias[] = "Producto {$productoModel->nombre}: Stock insuficiente (disponible: {$stockDisponible}, solicitado: {$producto['cantidad']})";
                                    continue;
                                }
                                
                                // Determinar el destino final
                                $destinoFinal = !empty($producto['destino_especifico']) 
                                    ? $producto['destino_especifico'] 
                                    : $data['destino_principal'];
                                
                                // Crear la salida
                                $salida = Salida::create([
                                    'user_id' => $userId,
                                    'producto_id' => $producto['producto_id'],
                                    'cantidad' => $producto['cantidad'],
                                    'fecha' => $data['fecha_despacho'],
                                    'hora' => $data['hora_despacho'],
                                    'destino' => $destinoFinal,
                                    'tipo_despacho' => $data['tipo_despacho'],
                                ]);
                                
                                $productosProcessados++;
                                
                            } catch (\Exception $e) {
                                $productoNombre = Producto::find($producto['producto_id'])?->nombre ?? 'Producto ID: ' . $producto['producto_id'];
                                $errores[] = "Error al procesar {$productoNombre}: " . $e->getMessage();
                            }
                        }
                        
                        // Notificaciones
                        if ($productosProcessados > 0) {
                            Notification::make()
                                ->title('Salida masiva registrada exitosamente')
                                ->body("Se registraron {$productosProcessados} productos correctamente.")
                                ->success()
                                ->duration(5000)
                                ->send();
                        }
                        
                        if (!empty($advertencias)) {
                            Notification::make()
                                ->title('Advertencias de Stock')
                                ->body(implode('\n', array_slice($advertencias, 0, 3)) . (count($advertencias) > 3 ? '\n...' : ''))
                                ->warning()
                                ->duration(8000)
                                ->send();
                        }
                        
                        if (!empty($errores)) {
                            Notification::make()
                                ->title('Algunos productos no pudieron procesarse')
                                ->body(implode('\n', array_slice($errores, 0, 3)) . (count($errores) > 3 ? '\n...' : ''))
                                ->danger()
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
            'index' => Pages\ListSalidas::route('/'),
            'create' => Pages\CreateSalida::route('/create'),
            'edit' => Pages\EditSalida::route('/{record}/edit'),
        ];
    }
}
