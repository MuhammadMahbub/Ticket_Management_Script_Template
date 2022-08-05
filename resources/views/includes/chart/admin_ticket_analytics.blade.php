    @if ($search_data == 'year')
        <script>
            var options = {
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
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false,
                }
                },
                plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
                },
                dataLabels: {
                enabled: true
                },
                stroke: {
                show: true,
                width:1,
                colors: ['transparent']
                },
                xaxis: {
                categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                },
                fill: {
                opacity: 0.8
                },
                tooltip: {
                y: {
                    formatter: function (val) {
                    return val
                    }
                }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart_ticket"), options);
            chart.render();
        </script>
    @else
        <script>
            var options = {
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
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false,
                }
                },
                plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
                },
                dataLabels: {
                enabled: true
                },
                stroke: {
                show: true,
                width:1,
                colors: ['transparent']
                },
                xaxis: {
                categories: @json($all_days),
                },
                fill: {
                opacity: 0.8
                },
                tooltip: {
                y: {
                    formatter: function (val) {
                    return val
                    }
                }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart_ticket"), options);
            chart.render();
        </script>
    @endif
    
