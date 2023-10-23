@extends('admin.layouts.master')
@php
    $title = __('lang.admins');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', ['title' => $title])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    <form action="{{ $resource->id ? route('admin.admins.update', $resource->id) : route('admin.admins.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if($resource->id)
                            @method('PATCH')
                        @endif
                        <div class="row">
                            <div class="row">

                                <div class="col-sm-12 text-center pt-2 mb-5">
                                    <img height="120" width="120" style="border: 1px solid #ddd"
                                        class="rounded-circle image-preview-image position-relative" alt=""
                                        src="{{ asset($resource->image_path) }}">
                                    <span class="text-danger">*</span>
                                    <br>

                                    <label for="image" class="btn btn-primary mt-2">
                                        <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                    </label>
                                    <input type="file" onchange="changeImage(this, 'image')" id="image"
                                        class="form-control image d-none" name="image" {{ $resource->id ? '' : 'required' }}
                                        accept="image/*">
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    {!! Form::label('username', __('lang.username')) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('username', old('username', $resource->username ?? ''), [
                                        'class' => 'form-control',
                                        'required',
                                        'placeholder' => __('lang.username'),
                                    ]) !!}

                                    <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    {!! Form::label('email', __('lang.email')) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::email('email', old('email', $resource->email ?? ''), [
                                        'class' => 'form-control',
                                        'required',
                                        'placeholder' => __('lang.email'),
                                    ]) !!}

                                    <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    {!! Form::label('phone', __('lang.phone')) !!}
                                    {!! Form::number('phone', old('phone', $resource->phone ?? ''), [
                                        'class' => 'form-control',
                                        'required',
                                        'placeholder' => __('lang.phone'),
                                    ]) !!}
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    {!! Form::label('password', __('lang.password')) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::password('password', [
                                        'class' => 'form-control',
                                        $resource->id ? '' : 'required',
                                        'placeholder' => __('lang.password'),
                                    ]) !!}
                                    <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    {!! Form::label('password_confirmation', __('lang.password_confirmation')) !!}
                                    <span class="text-danger">*</span>
                                    {!! Form::password('password_confirmation', [
                                        'class' => 'form-control',
                                        $resource->id ? '' : 'required',
                                        'placeholder' => __('lang.password_confirmation'),
                                    ]) !!}
                                    <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 pt-2">
                                    {!! Form::label('role', __('lang.roles')) !!}
                                    <span class='text-danger'>*</span>

                                    {!! Form::select('role', $roles->pluck('display_name', 'name'), $resource->roles()->first()->name ?? '', [
                                        'class' => 'form-select select2',
                                        'required',
                                        'placeholder' => __('lang.choose_role'),
                                    ]) !!}

                                    <div class="invalid-feedback">{{ __('admin.please_enter_valid_value') }}.</div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                @if ($resource->id)
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
