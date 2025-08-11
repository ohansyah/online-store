<?php

namespace App\Http\Controllers;

use App\Charts\OrderOverviewChart;
use App\Models\Order;
use App\Models\OrderProduct;

class DashboardController extends Controller
{
    public function index(OrderOverviewChart $chart)
    {
        // sum orders.total today
        $sumOrderTotalToday = (int) Order::whereDate('created_at', now())->sum('total');

        // count orders today
        $countOrderToday = (int) Order::whereDate('created_at', now())->count();

        // count orders product today
        $countOrderProductToday = (int) OrderProduct::whereDate('created_at', now())->count();

        // format currency
        $sumOrderTotalToday = formatCurrency($sumOrderTotalToday);

        return view('dashboard', [
            'card' => compact('sumOrderTotalToday', 'countOrderToday', 'countOrderProductToday'),
            'chart' => $chart->build(),
        ]);
    }
}
