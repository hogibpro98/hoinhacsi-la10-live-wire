<div>
    <div id="{{ $chartId }}" style="height: 400px;"></div>
</div>
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
document.addEventListener('livewire:load', function() {
    Highcharts.chart({
        {
            $chartId
        }
    }, {
        chart: {
            type: 'spline',
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        credits: {
            enabled: false
        },
        legend: {
            enabled: false
        },
        yAxis: {
            opposite: true,
            title: {
                text: '',
            },
            labels: {
                enabled: true,
                style: {
                    color: '#707A8F',
                    fontSize: window.innerWidth >= 768 ? '16px' : '13px',
                    fontWeight: 500,
                    lineHeight: '24px',
                    fontFamily: 'Inter',
                    fontStyle: 'normal',
                    align: "right",
                },
            },
        },
        xAxis: {
            lineColor: '#E3E7ED',
            categories: ['13/07/2023', '14/07/2023', '15/07/2023', '16/07/2023', '17/07/2023',
                '18/07/2023',
                '19/07/2023', '20/07/2023', '21/07/2023'
            ],
            labels: {
                enabled: true,
                style: {
                    color: '#707A8F',
                    fontSize: window.innerWidth >= 768 ? '16px' : '13px',
                    fontWeight: 500,
                    lineHeight: '24px',
                    fontFamily: 'Inter',
                    fontStyle: 'normal',
                },
            },
        },
        series: [{
            name: 'Tokyo',
            color: '#0B89B7',
            data: {
                {
                    json_encode($chartData)
                }
            }
        }]
    });

});
</script>
@endpush