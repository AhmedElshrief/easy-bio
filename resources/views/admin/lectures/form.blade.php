@extends('admin.layouts.master')
@php
    if ($lecture->id) {
        $title = __('lang.edit') . ' ' . __('lang.lecture');
    } else {
        $title = __('lang.add') . ' ' . __('lang.lecture');
    }
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', [
        'title' => $title,
        'url' => route('admin.lectures.index'),
        'new_item' => __('lang.lectures'),
    ])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    <form action="{{ $lecture->id ? route('admin.lectures.update', $lecture->id) : route('admin.lectures.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($lecture->id)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <div class="col-sm-12 text-center pt-2 mb-5">
                                <img height="120" width="120" style="border: 1px solid #ddd"
                                    class="rounded-circle image-preview-image position-relative" alt=""
                                    src="{{ asset($lecture->image_path) }}">
                                <span class="text-danger">*</span>
                                <br>

                                <label for="image" class="btn btn-primary mt-2">
                                    <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                </label>
                                <input type="file" onchange="changeImage(this, 'image')" id="image"
                                    class="form-control image d-none" name="image" {{ $lecture->id ? '' : 'required' }}
                                    accept="image/*">
                            </div>

                            @foreach (config('translatable.locales') as $key => $locale)
                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    <div class="form-group">
                                        <label for="title">
                                            {{ __('lang.' . $locale . '.title') }}
                                        </label>
                                        <span class="text-danger">*</span>
                                        {!! Form::text("{$locale}[title]", old("{$locale}[title]", optional($lecture->translate($locale))->title), [
                                            'class' => 'form-control',
                                            'required',
                                        ]) !!}
                                    </div>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $key => $locale)
                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    <div class="form-group">
                                        <label for="description">
                                            {{ __('lang.' . $locale . '.description') }}
                                        </label>
                                        <span class="text-danger">*</span>
                                        {!! Form::text(
                                            "{$locale}[description]",
                                            old("{$locale}[description]", optional($lecture->translate($locale))->description),
                                            ['class' => 'form-control', 'required'],
                                        ) !!}
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('course_id',__('lang.course') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('course_id', $courses, old('course_id', $lecture->course_id), [
                                    "class"=>'form-control form-select select2',
                                    'required',
                                    "placeholder"=> __('lang.select_item')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-4">
                            <div class="form-group">
                                <label for="active">
                                    <input class="form-check-input" value="1" {{ old('active', optional($lecture)->active) ? 'checked' : '' }} type="checkbox" name="active" id="active">
                                    {{ __('lang.active') }}
                                </label>
                            </div>
                        </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        @if ($lecture->id)
                            {{ __('lang.update') }}
                        @else
                            {{ __('lang.save') }}
                        @endif
                    </button>
                </div>
                </form>
            @endslot
        @endcomponent
    </div>
    </div>

    </div>
@endsection
