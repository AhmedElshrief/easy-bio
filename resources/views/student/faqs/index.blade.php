@extends('student.layouts.master')

@php
    $title = __('lang.faqs');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('student.layouts.includes.breadcrumb', ['title' => $title])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('student.layouts.includes.card')

                @slot('content')
                    @component('student.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.question') }}</td>
                            <td>{{ __('lang.answer') }}</td>
                            {{-- <td>{{ __('lang.actions') }}</td> --}}
                        @endslot

                        @slot('data')
                            @if (count($faqs) > 0)
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->question ?? '' }}</td>
                                        <td>{{ $faq->answer ?? '' }}</td>
                                        {{-- <td>
                                            <a data-href="{{ route('student.faqs.show', $faq->id) }}" data-container=".table-modal"
                                                class="btn btn-modal btn-primary btn-sm"><i class="ti ti-eye"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        @include('student.layouts.includes.alert')
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

