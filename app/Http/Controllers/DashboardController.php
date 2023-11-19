<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Models\External_regulation;
use App\Models\Internal_regulation;
use App\Models\Ministerial_regulation;
use App\Models\Review_internalreg;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(DashboardChart $chart)
    {
        return view('dashboard.dashboardUtama.index', [
            'title' => 'Dashboard',
            'chart' => $chart->build(),
            'sumInternal' => Internal_regulation::count(),
            'sumExternal' => External_regulation::count(),
            'sumMinisterial' => Ministerial_regulation::count(),
            'sumReviewInternal' => Review_internalreg::count(),
            'sumReviewExternal' => ReviewEksternalReg::count(),
            'sumReviewExternalApproved' => ReviewEksternalReg::where('status_publish', 1)->count(),
        ]);
    }
}
