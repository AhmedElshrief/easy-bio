@extends('admin.layouts.master')

@php
    $title = __('lang.withdraw_requests');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', ['title' => $title])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('tool')
                    {{-- <a href="{{ route('admin.withdraw_requests.create') }}" class="btn btn-primary float-end mb-2">
                        <i class="ti ti-plus"></i> {{ __('lang.add') . ' ' . __('lang.withdraw_request') }}
                    </a> --}}
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.amount') }}</td>
                            <td>{{ __('lang.image') }}</td>
                            <td>{{ __('lang.user') }}</td>
                            <td>{{ __('lang.approved') }}</td>
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
                                            <img class="rounded-circle" src="{{ $withdraw_request->image_path }}" alt="" width="50" height="50">
                                        </td>
                                        <td>{{ $withdraw_request->user->name ?? '' }}</td>
                                        <td>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <label class="">
                                                        <a data-href="{{ route('admin.wallet_transactions.create', $withdraw_request->user_id) }}" data-container=".table-modal" class="btn btn-primary btn-modal">
                                                            {{ __('lang.approve') }}
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <label class="switch">
                                                        <input onclick="changeActive(this,{{ $withdraw_request->id }})"
                                                            data-status="{{ $withdraw_request->status }}" {{  $withdraw_request->status == \App\Models\WithDrawRequest::APPROVED ? 'checked' : '' }}
                                                            class="form-check-input" value="{{ $withdraw_request->status }}" type="checkbox"
                                                            name="status">
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td> --}}

                                        <td>
                                            <a href="{{ route('admin.withdraw_requests.edit', $withdraw_request->id) }}"
                                                class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
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
        function changeActive(el, id) {
            $(el).off('change').on('change', function() {
                let value = 'pending';
                if($(el).data('status') == 'pending') {
                    value = 'approved';
                    $(el).data('status', value);
                } else if($(el).data('status') == 'approved') {
                    value = 'pending';
                    $(el).data('status', value);
                }
                $.post("{{ route('admin.withdraw_requests.changeStatus') }}", {
                    'id': id,
                    'value': value,
                    '_token': "{{ csrf_token() }}"
                }, function(results) {
                    const alertType = results.success ? "success" : "error";
                    swal.fire("", results.message, alertType);
                });
            });
        }
    </script>
@endsection


