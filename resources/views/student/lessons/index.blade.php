@extends('student.layouts.master')

@php
    $title = __('lang.lessons');
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
                            <td>{{ __('lang.title') }}</td>
                            <td>{{ __('lang.lecture') }}</td>
                            <td>{{ __('lang.price') }}</td>
                            <td>{{ __('lang.hours') }}</td>
                            {{-- <td>{{ __('lang.vimeo_embed') }}</td> --}}
                            <td>{{ __('lang.description') }}</td>
                            {{-- <td>{{ __('lang.actions') }}</td> --}}
                        @endslot

                        @slot('data')
                            @if (count($lessons) > 0)
                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img class="rounded-circle" src="{{ $lesson->image_path }}" alt="" width="50" height="50">
                                            {{ $lesson->title ?? '' }}
                                        </td>
                                        <td>{{ $lesson->lecture->title ?? '' }}</td>
                                        <td>{{ $lesson->price ?? '' }}</td>
                                        <td>{{ $lesson->hours ?? '' }}</td>
                                        {{-- <td>{{ $lesson->vimeo_embed ?? '' }}</td> --}}
                                        <td>{{ $lesson->description ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('student.lessons.show', $lesson->id) }}" class="btn btn-primary btn-sm">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        @include('student.layouts.includes.alert')
                                    </td>
                                </tr>
                            @endif
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $lessons->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection



