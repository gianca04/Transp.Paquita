<?php

namespace App\Filament\Widgets;

use App\Models\Entrada;
use App\Models\Salida;
use Filament\Widgets\LineChartWidget;

class EntradaResource extends LineChartWidget
{
    protected static ?string $heading = 'Entradas vs Salidas por Mes';

    protected function getData(): array
    {
        $entradas = Entrada::selectRaw('MONTH(fecha) as mes, SUM(cantidad) as total')
            ->groupByRaw('MONTH(fecha)')
            ->orderByRaw('MONTH(fecha)')
            ->pluck('total', 'mes');

        $salidas = Salida::selectRaw('MONTH(fecha) as mes, SUM(cantidad) as total')
            ->groupByRaw('MONTH(fecha)')
            ->orderByRaw('MONTH(fecha)')
            ->pluck('total', 'mes');

        // Nombres de los meses (1-12)
        $meses = [
            1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic',
        ];

        $labels = array_values($meses);

        $dataEntradas = [];
        $dataSalidas = [];

        foreach ($meses as $mesNum => $mesNombre) {
            $dataEntradas[] = $entradas[$mesNum] ?? 0;
            $dataSalidas[] = $salidas[$mesNum] ?? 0;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Entradas',
                    'data' => $dataEntradas,
                    'borderColor' => '#10b981',
                    'backgroundColor' => '#10b981',
                ],
                [
                    'label' => 'Salidas',
                    'data' => $dataSalidas,
                    'borderColor' => '#ef4444',
                    'backgroundColor' => '#ef4444',
                ],
            ],
        ];
    }

    protected static string $chartType = 'line';
}
