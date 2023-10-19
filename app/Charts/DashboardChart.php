<?php

namespace App\Charts;

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
        return $this->chart->pieChart()
            ->setTitle('Statistik Reviu Peraturan Eksternal')
            ->setSubtitle('Season 2021.')
            ->addData([17, 4])
            ->setColors(['#3876BF', '#E1AA74'])
            ->setLabels(['Aproved', 'Draft']);
    }
}
