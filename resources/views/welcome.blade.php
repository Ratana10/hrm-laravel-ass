@extends('layouts.adminlte.master')
@push('meta')
    <title>{{ __('Dashboard') }}</title>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="text-white fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Tenants</span>
                        <span class="info-box-number">{{ $totalTenants }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="text-white fa fa-home"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Room Available</span>
                        <span class="info-box-number">{{ $availableRooms }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="text-white bi bi-door-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Room Need to Pay</span>
                        <span class="info-box-number">{{ $tenantsWithOutstandingInvoicesCount }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="text-white bi bi-currency-exchange"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Outstanding Balance</span>
                        <span class="info-box-number">{{ $outstandingBalance }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="chart3"></div>
            </div>
            <div class="col-md-6">
                <div id="chart4"></div>
            </div>
            <div class="col-12">
                <div id="chart5"></div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script>
        var options3 = {
            series: [{{ $totalTenants }},   {{ $availableRooms }},   {{ $totalRooms }}, 43],
            labels: ['Total Tenants', 'Total Room Available', 'Total Room Need to Pay', 'Total Outstanding Balance',
            ],
            chart: {
                height: 350,
                type: 'donut'
            },
            colors: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#8b9467'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                    }
                }
            },
            title: {
                text: 'Total Tenants And Total Room Available'
            },
            stroke: {
                lineCap: 'round'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: '100%'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
        chart3.render();

        var options4 = {
            series: [{
                name: 'Total',
                data: [{{ $availableRooms }}, {{ $totalRooms }}]
            }],
            chart: {
                height: 350,
                type: 'bar'
            },
            colors: ['#007bff'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            title: {
                text: 'Total Room Available and Total Room'
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Total Room Available', 'Total Room']
            }
        };

        var chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
        chart4.render();

        var options5 = {
            series: [{
                name: 'Income',
                data: {!! json_encode($chartIncomeData) !!}
            }],
            chart: {
                height: 350,
                type: 'line'
            },
            colors: ['#17a2b8'],
            title: {
                text: 'Income in Current Year'
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            }
        };

        var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
        chart5.render();
    </script>
@endpush
