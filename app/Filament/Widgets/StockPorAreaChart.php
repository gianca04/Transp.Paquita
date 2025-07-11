<?php

namespace App\Filament\Widgets;

use App\Models\Stock;
use Filament\Widgets\BarChartWidget;

class StockPorAreaChart extends BarChartWidget
{
    protected static ?string $heading = 'Stock total por Área';

    protected function getData(): array
    {
        // Obtenemos todos los stocks con su producto y el área de ese producto
        $stocks = Stock::with('producto.area')->get();

        // Agrupar por área y sumar la cantidad
        $agrupado = $stocks->groupBy(fn($stock) => optional($stock->producto->area)->nombre);

        $labels = [];
        $cantidades = [];

        foreach ($agrupado as $area => $stocksDeArea) {
            $labels[] = $area ?? 'Sin área';
            $cantidades[] = $stocksDeArea->sum('cantidad');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Cantidad total',
                    'data' => $cantidades,
                    'backgroundColor' => '#10b981', // verde
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected static ?int $sort = 1;
    protected static string $chartType = 'bar';
}
