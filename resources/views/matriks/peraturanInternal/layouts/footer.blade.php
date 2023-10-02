<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: [{
            name: 'Peraturan Direksi',
            data: [44, 55, 57, 61, 67]
        }, {
            name: 'Surat Edaran',
            data: [76, 85, 101, 76, 80]
        }],
        chart: {
            type: 'bar',
            height: 350,
            width: 900,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: [2019, 2020, 2021, 2022, 2023],
        },
        yaxis: {
            // title: {
            //     text: '$ (thousands)'
            // }
        },
        fill: {
            opacity: 1,
            colors: ['#BF0000', '#1a1a1a'],
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    // return "$ " + val + " thousands"
                    return val
                }
            }
        },
        legend: {
            show: true,
            showForSingleSeries: false,
            showForNullSeries: true,
            showForZeroSeries: true,
            position: 'bottom',
            horizontalAlign: 'center',
            floating: false,
            fontSize: '14px',
            fontFamily: 'Helvetica, Arial',
            fontWeight: 400,
            formatter: undefined,
            inverseOrder: false,
            width: undefined,
            height: undefined,
            tooltipHoverFormatter: undefined,
            customLegendItems: [],
            offsetX: 0,
            offsetY: 0,
            labels: {
                colors: undefined,
                useSeriesColors: false
            },
            markers: {
                width: 12,
                height: 12,
                strokeWidth: 0,
                strokeColor: '#fff',
                fillColors: ['#BF0000', '#1a1a1a'],
                // radius: 12,
                customHTML: undefined,
                onClick: undefined,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: {
                horizontal: 5,
                vertical: 0
            },
            onItemClick: {
                toggleDataSeries: true
            },
            onItemHover: {
                highlightDataSeries: true
            },
        }


    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
