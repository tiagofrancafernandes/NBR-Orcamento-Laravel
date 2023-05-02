<!-- Chart -->
<div class="chart">
    <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
        class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand"
            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div
                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
            </div>
        </div>
        <div class="chartjs-size-monitor-shrink"
            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0">
            </div>
        </div>
    </div>
    <canvas id="chart" style="display: block; height: 154px; width: 344px;"
        class="chartjs-render-monitor"
        width="344"
        height="154"></canvas>
</div>

@section('before_body_close')
<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["01 Apr", "02 Apr", "03 Apr", "04 Apr", "05 Apr", "06 Apr", "07 Apr", "08 Apr", "09 Apr", "10 Apr", "11 Apr", "12 Apr", "13 Apr", "14 Apr", "15 Apr", "16 Apr", "17 Apr", "18 Apr", "19 Apr", "20 Apr", "21 Apr", "22 Apr", "23 Apr", "24 Apr", "25 Apr", "26 Apr", "27 Apr", "28 Apr", "29 Apr", "30 Apr"],
            // Information about the dataset
            datasets: [{
                label: "Words Used",
                backgroundColor: '#10a37f15',
                borderColor: '#10a37f',
                borderWidth: "3",
                data: ["22069", "66799", "144960", "134233", "157532", "140549", "146710", "116944", "70601", "77957", "255183", "214260", "172682", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                pointRadius: 5,
                pointHoverRadius: 5,
                pointHitRadius: 10,
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointBorderWidth: "2",
            }]
        },

        // Configuration options
        options: {
            layout: {
                padding: 10,
            },
            legend: { display: false },
            title: { display: false },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: false
                    },
                    gridLines: {
                        borderDash: [6, 10],
                        color: "#d8d8d8",
                        lineWidth: 1,
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    scaleLabel: { display: false },
                    gridLines: { display: false },
                }],
            },
            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 13,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            }
        },
    });

</script>
@endsection
