@extends('student.layouts.master')

@php
    $title = __('lang.show_lesson') . ' ' . $lesson->title;
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('student.layouts.includes.breadcrumb', [
        'title' => $title,
        'url' => route('student.lessons.index'),
        'new_item' => __('lang.lessons'),
    ])

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">

                {{-- <div class="mb-5">
                    {!! $lesson->vimeo_embed !!}
                </div> --}}

                <div class="mb-5 ">
                    <h3>{{ __('lang.to_watch_the_videos_that_you_have_please_download_mobile_app_or_computer_version') }}</h3>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ $settings['app_link'] ?? '#' }}" class="bg-primary text-white p-3 rounded me-4"
                            title="{{ __('lang.download') }}" target="_blank">
                            <i class="ti ti-download"></i>
                            {{ __('lang.download_app') }}
                        </a>

                        <a href="{{ $settings['computer_app_link'] ?? '#'  }}" class="bg-danger text-white p-3 rounded me-4"
                            title="{{ __('lang.download') }}" target="_blank">
                            <i class="ti ti-download"></i>
                            {{ __('lang.download_computer_app') }}
                        </a>

                    </div>
                </div>

                <div class="mb-5">
                    <h3>{{ __('lang.description') }}</h3>
                    <p>{{ $lesson->description ?? '' }}</p>
                </div>

                <div>

                    <h3 class="mb-4">{{ __('lang.files') }}</h3>
                    @if (count($lesson->files) > 0)
                        @foreach ($lesson->files as $item)
                            <div class="mt-3 d-flex">
                                <div>
                                    <a href="{{ route('student.lessons.download', $item->id) }}" class="me-4"
                                        title="{{ __('lang.download') }}">
                                        <i class="ti ti-download"></i>
                                    </a>
                                    <a href="{{ asset($item->path) }}" target="_blank">{{ $item->origin_name }}</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection
