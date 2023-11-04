@extends('student.layouts.master')
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
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
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
@endsection
