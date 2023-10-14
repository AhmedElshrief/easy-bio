@extends('admin.layouts.master')

@php
    $title = __('lang.settings');
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
                    <form method="POST" action="{{ route('admin.settings.saveSettings') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('title_' . $locale, __('lang.title_' . $locale)) !!}
                                    {!! Form::text(
                                        'title_' . $locale,
                                        old('title_' . $locale, optional($settings->where('key', 'title_' . $locale))->first()->value ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('description_' . $locale, __('lang.description_' . $locale)) !!}
                                    {!! Form::textarea(
                                        'description_' . $locale,
                                        old(
                                            'description_' . $locale,
                                            optional($settings->where('key', 'description_' . $locale))->first()->value ?? '',
                                        ),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('address_' . $locale, __('lang.address_' . $locale)) !!}
                                    {!! Form::text(
                                        'address_' . $locale,
                                        old('address_' . $locale, optional($settings->where('key', 'address_' . $locale))->first()->value ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('about_us_' . $locale, __('lang.about_us_' . $locale)) !!}
                                    {!! Form::text(
                                        'about_us_' . $locale,
                                        old('about_us_' . $locale, optional($settings->where('key', 'about_us_' . $locale))->first()->value ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            <div class="col-md-6 pt-2">
                                {!! Form::label('app_link', __('lang.app_link')) !!}
                                {!! Form::text(
                                    'app_link',
                                    old('app_link', optional($settings->where('key', 'app_link'))->first()->value ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-6 pt-2">
                                {!! Form::label('youtube', __('lang.youtube')) !!}
                                {!! Form::text(
                                    'youtube',
                                    old('youtube', optional($settings->where('key', 'youtube'))->first()->value ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-6 pt-2">
                                {!! Form::label('facebook', __('lang.facebook')) !!}
                                {!! Form::text(
                                    'facebook',
                                    old('facebook', optional($settings->where('key', 'facebook'))->first()->value ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-6 pt-2">
                                {!! Form::label('email', __('lang.email')) !!}
                                {!! Form::email(
                                    'email',
                                    old('email', optional($settings->where('key', 'email'))->first()->value ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-12 pt-2">
                                {!! Form::label('phone', __('lang.phone')) !!}
                                {!! Form::number(
                                    'phone',
                                    old('phone', optional($settings->where('key', 'phone'))->first()->value ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-sm-12 col-md-12 pt-4">
                                {!! Form::label('logo', __('lang.logo')) !!}
                                <img height="50" width="50" class="rounded-circle image-preview-1 position-relative" alt=""
                                    src="{{ asset(optional($settings->where('key', 'logo'))->first()->value ?? '') }}">
                                <input type="file" class="form-control " onchange="changeImage(this, 1)" name="logo">
                            </div>

                        </div>

                        <div class="row pt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                            </div>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
