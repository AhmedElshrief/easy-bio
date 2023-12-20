@extends('admin.layouts.master')
@php
    if ($student->id) {
        $title = __('lang.edit') . ' ' . __('lang.student');
    } else {
        $title = __('lang.add') . ' ' . __('lang.student');
    }
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', [
        'title' => $title,
        'url' => route('admin.students.index'),
        'new_item' => __('lang.students'),
    ])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    <form action="{{ $student->id ? route('admin.students.update', $student->id) : route('admin.students.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($student->id)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <div class="col-sm-12 text-center pt-2">
                                <img height="120" width="120" style="border: 1px solid #ddd"
                                    class="rounded-circle image-preview-image position-relative" alt=""
                                    src="{{ asset($student->image_path) }}">
                                <br>
                                <label for="image" class="btn btn-primary mt-2">
                                    <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                </label>
                                <input type="file" onchange="changeImage(this, 'image')" id="image"
                                    class="form-control image d-none" name="image" accept="image/*">
                            </div>


                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('name',__('lang.name') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('name', old('name', $student->name), [
                                    "class"=>'form-control form-input',
                                    'required',
                                    "placeholder"=> __('lang.name')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('username',__('lang.username') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('username', old('username', $student->username), [
                                    "class"=>'form-control form-input',
                                    'required',
                                    "placeholder"=> __('lang.username')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('password',__('lang.password') ) !!}
                            {!! Form::text('password', old('password'), [
                                    "class"=>'form-control form-input',
                                    "placeholder"=> __('lang.password')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('password_confirmation',__('lang.password_confirmation') ) !!}
                            {!! Form::text('password_confirmation', old('password_confirmation'), [
                                    "class"=>'form-control form-input',
                                    "placeholder"=> __('lang.password_confirmation')
                                ])
                            !!}
                        </div>

                        <div class="mb-4">
                            {!! Form::label('password_confirmation', __('lang.password_confirmation'), ['class' => 'mb-2']) !!}
                            <span class="text-danger">*</span>
                            {!! Form::password('password_confirmation', [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('lang.password_confirmation'),
                            ]) !!}
                            <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('email',__('lang.email') ) !!}
                            {!! Form::email('email', old('email', $student->email), [
                                    "class"=>'form-control form-input',
                                    "placeholder"=> __('lang.email')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('phone',__('lang.student_phone') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('phone', old('phone', $student->phone), [
                                    "class"=>'form-control form-input',
                                    'required',
                                    "placeholder"=> __('lang.phone')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('parent_phone',__('lang.parent_phone') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::text('parent_phone', old('parent_phone', $student->parent_phone), [
                                    "class"=>'form-control form-input',
                                    'required',
                                    "placeholder"=> __('lang.parent_phone')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('level_id',__('lang.level') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('level_id', $levels, old('level_id', $student->level_id), [
                                    "class"=>'form-control form-select select2',
                                    'required',
                                    "placeholder"=> __('lang.select_item')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('city_id',__('lang.city') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('city_id', $cities, old('city_id', $student->city_id), [
                                    "class"=>'form-control form-select select2',
                                    'required',
                                    "placeholder"=> __('lang.select_item')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-4">
                            <div class="form-group">
                                <label for="status">
                                    <input class="form-check-input" value="{{ \App\Models\User::ACTIVE }}" {{ old('status', optional($student)->status == \App\Models\User::ACTIVE) ? 'checked' : '' }} type="checkbox" name="status" id="status">
                                    {{ __('lang.status') }}
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                @if ($student->id)
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
