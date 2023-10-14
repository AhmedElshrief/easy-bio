@extends('admin.layouts.master')
@php
    if ($course->id) {
        $title = __('lang.edit') . ' ' . __('lang.course');
    } else {
        $title = __('lang.add') . ' ' . __('lang.course');
    }
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', [
        'title' => $title,
        'url' => route('admin.courses.index'),
        'new_item' => __('lang.courses'),
    ])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    <form action="{{ $course->id ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($course->id)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <div class="col-sm-12 text-center pt-2 mb-5">
                                <img height="120" width="120" style="border: 1px solid #ddd"
                                    class="rounded-circle image-preview-image position-relative" alt=""
                                    src="{{ asset($course->image_path) }}">
                                <span class="text-danger">*</span>
                                <br>

                                <label for="image" class="btn btn-primary mt-2">
                                    <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                </label>
                                <input type="file" onchange="changeImage(this, 'image')" id="image"
                                    class="form-control image d-none" name="image" {{ $course->id ? '' : 'required' }}
                                    accept="image/*">
                            </div>

                            @foreach (config('translatable.locales') as $key => $locale)
                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    <div class="form-group">
                                        <label for="title">
                                            {{ __('lang.' . $locale . '.title') }}
                                        </label>
                                        <span class="text-danger">*</span>
                                        {!! Form::text("{$locale}[title]", old("{$locale}[title]", optional($course->translate($locale))->title), [
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
                                            old("{$locale}[description]", optional($course->translate($locale))->description),
                                            ['class' => 'form-control', 'required'],
                                        ) !!}
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('level_id',__('lang.level') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('level_id', $levels, old('level_id', $course->level_id), [
                                    "class"=>'form-control form-select select2',
                                    'required',
                                    "placeholder"=> __('lang.select_item')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-4">
                            <div class="form-group">
                                <label for="active">
                                    <input class="form-check-input" value="1" {{ old('active', optional($course)->active) ? 'checked' : '' }} type="checkbox" name="active" id="active">
                                    {{ __('lang.active') }}
                                </label>
                            </div>
                        </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        @if ($course->id)
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
