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

    <div class="row pt-4">
        <div class="col-md-12">

            <div id="loader" class="text-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

           <div class="mb-5">
                <iframe id="video" width="100%" height="500" src="{{ $lesson->vimeo_embed }}">
                </iframe>
           </div>

            <div>

                <h3 class="mb-4">{{ __('lang.files') }}</h3>
                @if (count($lesson->files) > 0)

                    @foreach ($lesson->files as $item)

                        <div class="mt-3 d-flex">
                            <div>
                                <a href="{{ route('student.lessons.download', $item->id) }}" class="me-4" title="{{ __('lang.download') }}">
                                    <i class="ti ti-download"></i>
                                </a>
                                {{-- <embed src="{{ asset($item->path) }}" width="100" height="70" alt="pdf" /> --}}
                                <a href="{{ asset($item->path) }}" target="_blank">{{ $item->origin_name }}</a>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>

@endsection

<script>
    $(document).ready(function() {
        $('#video').on('load', function() {
            $('#loader').hide();
            $('#video').show();
        });

        $('#closeModal').on('click', function (e) {
            $('#video').attr('src', '');
        });
    });
</script>
