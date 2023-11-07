@extends('admin.layouts.master')

@php
    $title = __('lang.withdraw_requests');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', ['title' => $title])

    <div class="row">
        <div class="col-md-12">

            @component('admin.layouts.includes.card', ['id' => 'filter_body'])
                @slot('tool')
                    <button class="btn btn-xs btn-success {{ isRtl() ? 'float-start' : 'float-end' }}"
                        onclick="$('#filter_body').slideToggle()">
                        <i class="ti ti-filter"></i>
                    </button>
                @endslot

                @slot('content')
                    @include('admin.withdraw_requests.filter')
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('tool')
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.amount') }}</td>
                            <td>{{ __('lang.image') }}</td>
                            <td>{{ __('lang.user') }}</td>
                            <td>{{ __('lang.status') }}</td>
                            <td>{{ __('lang.actions') }}</td>
                        @endslot

                        @slot('data')
                            @if (count($withdraw_requests) > 0)
                                @foreach ($withdraw_requests as $withdraw_request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $withdraw_request->amount ?? '' }}
                                        </td>
                                        <td>
                                            <img class="rounded-circle" src="{{ $withdraw_request->image_path }}" alt="" width="50"
                                                height="50">
                                        </td>
                                        <td>{{ $withdraw_request->user->name ?? '' }}</td>
                                        <td>
                                            @if ($withdraw_request->status == 'pending')
                                                <span class="badge bg-warning">{{ __('lang.pending') }}</span>
                                            @elseif ($withdraw_request->status == 'refused')
                                                <span class="badge bg-danger">{{ __('lang.refused') }}</span>
                                            @elseif ($withdraw_request->status == 'approved')
                                                <span class="badge bg-success">{{ __('lang.approved') }}</span>
                                            @endif
                                        </td>

                                        <td>

                                            @if ($withdraw_request->status == 'pending')

                                                <a data-href="{{ route('admin.wallet_transactions.create', $withdraw_request->user_id) }}"
                                                    data-container=".table-modal" class="btn btn-primary btn-sm btn-modal">
                                                    <i class="ti ti-plus"></i>
                                                    {{ __('lang.approve') }}
                                                </a>
                                                <a href="{{ route('admin.withdraw_requests.refuse', $withdraw_request->id) }}"
                                                    class="btn btn-danger btn-sm" id="refuse">
                                                    <i class="ti ti-ban"></i>
                                                    {{ __('lang.refuse') }}
                                                </a>

                                            @endif
                                            <a data-href="{{ route('admin.withdraw_requests.destroy', $withdraw_request->id) }}"
                                                class="btn btn-danger sw-alert btn-sm"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        @include('admin.layouts.includes.alert')
                                    </td>
                                </tr>
                            @endif
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $withdraw_requests->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="modal fade table-modal" id="table-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>

@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#refuse').on('click', function(e) {
                e.preventDefault();
                if(confirm("{{ __('lang.are_you_sure') }}")) {
                    window.location.href = $(this).attr('href');
                }
            })
        })
    </script>
@endsection
