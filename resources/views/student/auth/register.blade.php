@extends('student.auth.layouts.master')

@section('content')
    <div
        class="pt-5 position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="pt-5 d-flex align-items-center justify-content-center w-100">

            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            {{-- <a href="{{ route('student.home') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset($settings['logo'] ?? '') }}" width="80" alt="">
                            </a> --}}
                            {{-- <p class="text-center"></p> --}}
                            <form action="{{ route('student.register.store') }}" method="post" enctype="multipart/form-data"
                                style="font-size: 16px">
                                @csrf

                                <div class="text-center mb-4">
                                    <img height="120" width="120" style="border: 1px solid #ddd"
                                        class="rounded-circle image-preview-image position-relative" alt=""
                                        src="{{ asset('assets/images/profile/user-1.jpg') }}">
                                    <br>
                                    <label for="image" class="btn btn-primary mt-2">
                                        <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                    </label>
                                    <input type="file" onchange="changeImage(this, 'image')" id="image"
                                        class="form-control image d-none" name="image" accept="image/*">
                                </div>

                                <div class="mb-3">
                                    {!! Form::label('name', __('lang.fourth_name'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('name', old('name'), [
                                        'class' => 'form-control form-input',
                                        'required',
                                        'placeholder' => __('lang.name'),
                                    ]) !!}
                                </div>

                                {{-- <div class="mb-4">
                                    {!! Form::label('email',__('lang.email') ) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::email('email', old('email'), [
                                            "class"=>'form-control form-input',
                                            'required',
                                            "placeholder"=> __('lang.email')
                                        ])
                                    !!}
                                </div> --}}

                                <div class="mb-4">
                                    {!! Form::label('username', __('lang.username'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('username', old('username'), [
                                        'class' => 'form-control form-input',
                                        'required',
                                        'placeholder' => __('lang.username'),
                                    ]) !!}
                                </div>

                                <div class="mb-4">
                                    {!! Form::label('phone', __('lang.student_phone'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('phone', old('phone'), [
                                        'class' => 'form-control form-input',
                                        'required',
                                        'placeholder' => __('lang.phone'),
                                    ]) !!}
                                </div>

                                <div class="mb-4">
                                    {!! Form::label('parent_phone', __('lang.parent_phone'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('parent_phone', old('parent_phone'), [
                                        'class' => 'form-control form-input',
                                        'required',
                                        'placeholder' => __('lang.parent_phone'),
                                    ]) !!}
                                </div>

                                <div class="mb-4">
                                    {!! Form::label('password', __('lang.password'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::password('password', [
                                        'class' => 'form-control',
                                        'required',
                                        'placeholder' => __('lang.password'),
                                    ]) !!}
                                    <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
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

                                <div class="mb-3">
                                    {!! Form::label('level_id', __('lang.level'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::select('level_id', $levels, old('level_id'), [
                                        'class' => 'form-control form-select select2',
                                        'required',
                                        'placeholder' => __('lang.select_item'),
                                    ]) !!}
                                </div>

                                <div class="mb-3">
                                    {!! Form::label('city_id', __('lang.city'), ['class' => 'mb-2']) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::select('city_id', $cities, old('city_id'), [
                                        'class' => 'form-control form-select select2',
                                        'required',
                                        'placeholder' => __('lang.select_item'),
                                    ]) !!}
                                </div>

                                <button type="submit"
                                    class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">{{ __('lang.register') }}</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
