@extends('admin.layouts.master')

@php
    $title = __('lang.levels');
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
                    <a data-href="{{ route('admin.levels.create') }}" data-container=".table-modal"
                        class="btn btn-modal btn-primary float-end mb-2"> <i class="ti ti-plus"></i>
                        {{ __('lang.add') . ' ' . __('lang.level') }}</a>
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.name') }}</td>
                            <td>{{ __('lang.actions') }}</td>
                        @endslot

                        @slot('data')
                            @if (count($levels) > 0)
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $level->name ?? '' }}</td>

                                        <td>
                                            <a data-href="{{ route('admin.levels.edit', $level->id) }}" data-container=".table-modal"
                                                class="btn btn-modal btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                            <a data-href="{{ route('admin.levels.destroy', $level->id) }}"
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
                        {{ $levels->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="modal fade table-modal" id="table-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>
@endsection

