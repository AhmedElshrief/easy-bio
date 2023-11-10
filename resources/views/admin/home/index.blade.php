@extends('admin.layouts.master')
@section('title', __('dashboard'))

@section('css')
    <style>
        .font-weight-bold {
            font-weight: 600 !important;
        }

        .icon {
            width: 3rem;
            height: 3rem;
        }

        .icon-shape {
            display: inline-flex;
            padding: 12px;
            text-align: center;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        @foreach ($totals as $total)
            <div class="col-md-4">
                <div class="card w3-animate-zoom w3-border w3-border-light-blue w3-hover-shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted">{{ $total['label'] }}</h5>
                                <span class="h4 font-weight-bold">{{ $total['count'] }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle">
                                    <img width="27" height="27" src="{{ asset($total['image']) }}" alt="">
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p> --}}
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{-- Max Lesson Count --}}
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card w3-animate-zoom w3-border w3-border-light-blue w3-hover-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted">{{ __('lang.max_lesson') }}</h5>
                            <span class="h4 font-weight-bold">{{ $maxLessonCount }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                <img width="27" height="27" src="{{ asset('assets/images/sidebar/lesson.png') }}" alt="">
                            </div>
                        </div>
                    </div> --}}
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
            </p> --}}
                {{-- </div>
            </div>
        </div>
    </div> --}}

    <!-- start of Chart widget with bar chart Ends-->
    <div class="row">
        <div class="col-md-12 box-col-12">
            <div class="card o-hidden">
                <div class="card-header">
                    <h5>{{ __('lang.subscriptions_during_year') }}</h5>
                </div>
                <div class="bar-chart-widget">
                    <div class="bottom-content card-body">
                        <div class="row">
                            <div class="col-12">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart widget with bar chart Ends-->

    @endsection

    @section('js')
    <script>
        $(document).ready(function() {
            let trans = @json(__('lang'));
            let options = {
                series: [{
                    name: 'Subscriptions',
                    data: [
                        @foreach (range(1, 12) as $month)
                            <?php $sub = $subscriptionsChart->where('month', $month)->first(); ?>
                            {{ $sub ? $sub->count : 0 }},
                        @endforeach
                    ]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 10,
                        dataLabels: {
                            position: 'top'
                        },
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ['#6F8078']
                    }
                },
                xaxis: {
                    categories: [trans.January, trans.February, trans.March, trans.April, trans.May, trans.June,
                        trans.July, trans.August, trans.September, trans.October, trans.November, trans
                        .December
                    ],
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },

                    tooltip: {
                        enabled: true
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(0);
                        },
                        style: {
                            colors: ['#6F8078']
                        }
                    }
                },
                title: {
                    text: trans.business_subscription_by_month,
                    floating: true,
                    offsetY: 330,
                    align: 'center',
                    style: {
                        color: '#444'
                    }
                }
            };

            let chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>
@endsection
