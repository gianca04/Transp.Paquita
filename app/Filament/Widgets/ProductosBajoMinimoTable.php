<?php

namespace App\Filament\Widgets;

use App\Models\Stock;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ProductosBajoMinimoTable extends TableWidget
{
    protected static ?string $heading = 'Productos con stock bajo el mínimo';

    protected function getTableQuery(): Builder
    {
        return Stock::query()
            ->with('producto')  // Asegúrate de que la relación con 'producto' esté siendo cargada
            ->where('cantidad', '<=', DB::raw('minimo'));  // Referencia la columna 'cantidad' de la tabla 'stocks'
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('producto.nombre')
                ->label('Producto')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('cantidad')
                ->label('Cantidad actual')
                ->color('danger')
                ->sortable(),

            Tables\Columns\TextColumn::make('minimo')
                ->label('Mínimo permitido')
                ->sortable(),

            Tables\Columns\TextColumn::make('medida')
                ->label('Unidad'),

            Tables\Columns\TextColumn::make('producto.area.nombre')
                ->label('Área'),

            Tables\Columns\TextColumn::make('producto.subArea.nombre')
                ->label('Subárea'),
        ];
    }

    protected int | string | array $columnSpan = 'full';
}
