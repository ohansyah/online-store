<?php

namespace App\Charts;

use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class OrderOverviewChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $orders = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->groupBy('date')
            ->toBase()
            ->get();

        $dates = $orders->pluck('date')->toArray();
        $totals = $orders->pluck('total')->toArray();

        return $this->chart->lineChart()
            ->addData('Total Sales', $totals)
            ->setXAxis($dates);
    }
}
