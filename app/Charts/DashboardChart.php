<?php

namespace App\Charts;

use App\Models\ReviewEksternalReg;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $sumReviewExternalDraft = ReviewEksternalReg::where('status_publish', 0)->count();
        $sumReviewExternalApproved = ReviewEksternalReg::where('status_publish', 1)->count();

        return $this->chart->pieChart()
            ->setTitle('Statistik Reviu Peraturan Eksternal')
            ->setSubtitle('*Data Keseluruhan')
            ->addData([$sumReviewExternalApproved, $sumReviewExternalDraft])
            ->setColors(['#3876BF', '#E1AA74'])
            ->setLabels(['Aproved', 'Draft']);
    }
}
