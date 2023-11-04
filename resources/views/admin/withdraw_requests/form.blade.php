@extends('admin.layouts.master')
@php
    if ($withdraw_request->id) {
        $title = __('lang.edit') . ' ' . __('lang.withdraw_request');
    } else {
        $title = __('lang.add') . ' ' . __('lang.withdraw_request');
    }
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', [
        'title' => $title,
        'url' => route('admin.withdraw_requests.index'),
        'new_item' => __('lang.withdraw_requests'),
    ])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    <form action="{{ $withdraw_request->id ? route('admin.withdraw_requests.update', $withdraw_request->id) : route('admin.withdraw_requests.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($withdraw_request->id)
                            @method('PUT')
                        @endif

                        <div class="row">

                            <div class="col-sm-12 text-center pt-2">
                                <img height="120" width="120" style="border: 1px solid #ddd"
                                    class="rounded-circle image-preview-image position-relative" alt=""
                                    src="{{ asset($withdraw_request->image_path) }}">
                                <br>

                                <label for="image" class="btn btn-primary mt-2">
                                    <i style="font-size: 20px" class="ti ti-cloud-upload"></i>
                                </label>
                                <input type="file" onchange="changeImage(this, 'image')" id="image"
                                    class="form-control image d-none" name="image" {{ $withdraw_request->id ? '' : 'required' }}
                                    accept="image/*">
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('amount',__('lang.amount') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::number('amount', old('amount', $withdraw_request->amount), [
                                    "class"=>'form-control form-input',
                                    'required',
                                    "placeholder"=> __('lang.amount')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-2">
                            {!! Form::label('user_id',__('lang.user') ) !!}
                            <span class="text-danger">*</span>
                            {!! Form::select('user_id', $users, old('user_id', $withdraw_request->user_id), [
                                    "class"=>'form-control form-select select2',
                                    'required',
                                    "placeholder"=> __('lang.select_item')
                                ])
                            !!}
                        </div>

                        <div class="col-sm-12 col-md-12 pt-4 mb-4">
                            {!! Form::label('status',__('lang.status') ) !!}
                            <select name="status" class="form-select" id="status">
                                <option value="" disabled>{{ __('lang.select_status') }}</option>
                                @foreach (\App\Models\WithdrawRequest::STATUS as $key => $value)
                                    <option value="{{ $key }}" {{ old('status', $withdraw_request->status) == $key ? 'selected' : '' }}>{{ __('lang.' . $value) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                @if ($withdraw_request->id)
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
