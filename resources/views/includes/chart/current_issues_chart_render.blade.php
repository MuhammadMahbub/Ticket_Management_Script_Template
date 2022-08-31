  @if ($search_data == 'current_month')
      
  <script>
    // Area Chart
var lineChartOptions = {
series: [{
    'name': 'Open Tickets',
    data: @json($open_ticket_datas)
    // [1646162003000, 38.34],
    // [1646248403000, 38.10],
    // [1646334803000, 38.51],
    // [1646432003000, 38.40],
},{
    'name': 'Solved Tickets',
    data: @json($close_ticket_datas)
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
        // text: 'Rally',
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
    type: 'datetime',
    min: new Date('{{ $view_month }}').getTime(),
    tickAmount: 6,
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

  @else

  <script>
    // Area Chart
var lineChartOptions = {
series: [{
    name: 'Open Tickets',
    data: @json($open_ticket_datas)

    // [1646162003000, 38.34],
    // [1646248403000, 38.10],
    // [1646334803000, 38.51],
    // [1646432003000, 38.40],
},{
    name: 'Solved Tickets',
    data: @json($close_ticket_datas)
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
        // text: 'Rally',
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
    type: 'datetime',
    min: new Date('{{ $view_month }}').getTime(),
    tickAmount: 6,
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

  @endif