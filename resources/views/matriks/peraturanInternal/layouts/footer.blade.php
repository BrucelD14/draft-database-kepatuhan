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
            width: 800,
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
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    // return "$ " + val + " thousands"
                    return val
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
