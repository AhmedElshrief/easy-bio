@extends('admin.layouts.master')

@php
    $title = __('lang.faqs');
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
                    <button class="btn btn-xs btn-success {{ isRtl() ? 'float-start' : 'float-end' }}" onclick="$('#filter_body').slideToggle()">
                        <i class="ti ti-filter"></i>
                    </button>
                @endslot

                @slot('content')
                    @include('admin.faqs.filter')
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('tool')
                    <a data-href="{{ route('admin.faqs.create') }}" data-container=".table-modal"
                        class="btn btn-modal btn-primary float-end mb-2"> <i class="ti ti-plus"></i>
                        {{ __('lang.add') . ' ' . __('lang.faq') }}</a>
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.question') }}</td>
                            <td>{{ __('lang.answer') }}</td>
                            <td>{{ __('lang.actions') }}</td>
                        @endslot

                        @slot('data')
                            @if (count($faqs) > 0)
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->question ?? '' }}</td>
                                        <td>{{ $faq->answer ?? '' }}</td>
                                        <td>
                                            <a data-href="{{ route('admin.faqs.edit', $faq->id) }}" data-container=".table-modal"
                                                class="btn btn-modal btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                            <a data-href="{{ route('admin.faqs.destroy', $faq->id) }}"
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
                @endslot
            @endcomponent
            <div class="d-flex justify-content-center mt-4">
                {{ $faqs->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade table-modal" id="table-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>
@endsection

