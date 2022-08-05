<script>
    // Area Chart
    var lineChartOptions = {
        series: [{
            name: 'Total tickets',
            data: @json($total_ticket)
            }, {
            name: 'Opended ticket',
            data: @json($opened_ticket)
            }, {
            name: 'Pending Tickets',
            data: @json($pending_ticket)
            }, {
            name: 'Solved ticket',
            data: @json($solved_ticket)
        }],
        chart: {
            id: 'area-datetime',
            type: 'area',
            height: 350,
            zoom: {
            autoScaleYaxis: true
            },
            toolbar: {
            show: false
            }
        },
        annotations: {
            yaxis: [{
            y: 30,
            borderColor: '#999',
            label: {
                show: true,
                text: 'Support',
                style: {
                color: "#fff",
                background: '#00E396'
                }
            }
            }],
            xaxis: [{
            x: new Date('14 Nov 2012').getTime(),
            borderColor: '#999',
            yAxisIndex: 0,
            label: {
                show: true,
                text: 'Rally',
                style: {
                color: "#fff",
                background: '#775DD0'
                }
            }
            }]
        },
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
            style: 'hollow',
        },
        xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        tooltip: {
            x: {
            format: 'dd MMM yyyy'
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 100]
            }
        },
    };

    var chart2 = new ApexCharts(document.querySelector("#chart2"), lineChartOptions);
    chart2.render();
</script>