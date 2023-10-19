<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(DashboardChart $chart)
    {
        return view('dashboard.dashboardUtama.index', [
            'title' => 'Dashboard',
            'chart' => $chart->build(),
        ]);
    }
}
