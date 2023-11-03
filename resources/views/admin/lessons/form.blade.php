@extends('admin.layouts.master')
@php
    if ($lesson->id) {
        $title = __('lang.edit') . ' ' . __('lang.lesson');
    } else {
        $title = __('lang.add') . ' ' . __('lang.lesson');
    }
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', [
        'title' => $title,
        'url' => route('admin.lessons.index'),
        'new_item' => __('lang.lessons'),
    ])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    <form action="{{ $lesson->id ? route('admin.lessons.update', $lesson->id) : route('admin.lessons.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($lesson->id)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <div class="col-sm-12 text-center pt-2 mb-5">
                                <img height="120" width="120" style="border: 1px solid #ddd"
                                    class="rounded-circle image-preview-image position-relative" alt=""
                                    src="{{ asset($lesson->image_path) }}">
                                <span class="text-danger">*</span>
                                <br>

                                <label for="image" class="btn btn-primary mt-2">
                                    <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                </label>
                                <input type="file" onchange="changeImage(this, 'image')" id="image"
                                    class="form-control image d-none" name="image" {{ $lesson->id ? '' : 'required' }}
                                    accept="image/*">
                            </div>

                            @foreach (config('translatable.locales') as $key => $locale)
                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    <div class="form-group">
                                        <label for="title">
                                            {{ __('lang.' . $locale . '.title') }}
                                        </label>
                                        <span class="text-danger">*</span>
                                        {!! Form::text("{$locale}[title]", old("{$locale}[title]", optional($lesson->translate($locale))->title), [
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
                                            old("{$locale}[description]", optional($lesson->translate($locale))->description),
                                            ['class' => 'form-control', 'required'],
                                        ) !!}
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-6 col-sm-12 pt-2">
                                {!! Form::label('price',__('lang.price') ) !!}
                                <span class="text-danger">*</span>
                                {!! Form::number('price', old('price', $lesson->price), [
                                        "class"=>'form-control form-input',
                                        'required',
                                        "placeholder"=> __('lang.select_item')
                                    ])
                                !!}
                            </div>

                            <div class="col-sm-12 col-md-6 pt-2">
                                {!! Form::label('hours',__('lang.hours') ) !!}
                                <span class="text-danger">*</span>
                                {!! Form::number('hours', old('hours', $lesson->hours), [
                                        "class"=>'form-control form-input',
                                        'required',
                                        "placeholder"=> __('lang.select_item')
                                    ])
                                !!}
                            </div>

                            <div class="col-sm-12 col-md-6 pt-2">
                                {!! Form::label('lecture_id',__('lang.lecture') ) !!}
                                <span class="text-danger">*</span>
                                {!! Form::select('lecture_id', $lectures, old('lecture_id', $lesson->lecture_id), [
                                        "class"=>'form-control form-select select2',
                                        'required',
                                        "placeholder"=> __('lang.select_item')
                                    ])
                                !!}
                            </div>

                            <div class="col-sm-12 col-md-12 pt-2">
                                {!! Form::label('vimeo_embed',__('lang.vimeo_embed') ) !!}
                                <span class="text-danger">*</span>
                                {!! Form::textarea('vimeo_embed', old('vimeo_embed', $lesson->vimeo_embed), [
                                        "class"=>'form-control form-input',
                                        'rows' => 5,
                                        'required',
                                        "placeholder" => __('lang.select_item')
                                    ])
                                !!}
                            </div>

                            <div class="col-sm-12 col-md-12 pt-2">
                                {!! Form::label('files',__('lang.files') ) !!}
                                {!! Form::file('files[]', [
                                        "class" => 'form-control form-input',
                                        'multiple',
                                ]) !!}
                            </div>

                            <div>
                                @if (count($lesson->files) > 0)
                                    @foreach ($lesson->files as $item)
                                        <div class="mt-3 d-flex">
                                            <div class="delete-file h4 text-danger cursor-pointer ms-2 me-2"
                                                data-id="{{ $item->id }}">
                                                <i class="ti ti-trash"></i>
                                            </div>
                                            <div>
                                                {{-- <embed src="{{ asset($item->path) }}" width="100" height="70" alt="pdf" /> --}}
                                                <a href="{{ asset($item->path) }}"
                                                    target="_blank">{{ $item->origin_name }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="active">
                                        <input class="form-check-input" value="1" {{ old('active', optional($lesson)->active) ? 'checked' : '' }} type="checkbox" name="active" id="active">
                                        {{ __('lang.active') }}
                                    </label>
                                </div>
                            </div>

                        </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            @if ($lesson->id)
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
@endsection

@section('js')

    <script>
         // delete file by ajax
         $('.delete-file').on('click', function() {
            if (confirm('{{ __("lang.are_you_sure") }}')) {
                $(this).parent().remove();
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route("admin.lessons.delete-file") }}',
                    data: {
                        file_id: $(this).attr('data-id'),
                        _token: '{{ csrf_token() }}',
                    },
                })
            }

        });
    </script>

@endsection
