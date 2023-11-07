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
                                        old('title_' . $locale, $settings['title_' . $locale] ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('description_' . $locale, __('lang.description_' . $locale)) !!}
                                    {!! Form::textarea(
                                        'description_' . $locale,
                                        old('description_' . $locale, $settings['description_' . $locale] ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('address_' . $locale, __('lang.address_' . $locale)) !!}
                                    {!! Form::text(
                                        'address_' . $locale,
                                        old('address_' . $locale, $settings['address_' . $locale] ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $locale)
                                <div class="col-md-6 pt-2">
                                    {!! Form::label('about_us_' . $locale, __('lang.about_us_' . $locale)) !!}
                                    {!! Form::text(
                                        'about_us_' . $locale,
                                        old('about_us_' . $locale, $settings['about_us_' . $locale] ?? ''),
                                        ['class' => 'form-control'],
                                    ) !!}
                                </div>
                            @endforeach

                            <div class="col-md-6 pt-2">
                                {!! Form::label('app_link', __('lang.app_link')) !!}
                                {!! Form::text(
                                    'app_link',
                                    old('app_link', $settings['app_link'] ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-6 pt-2">
                                {!! Form::label('youtube', __('lang.youtube')) !!}
                                {!! Form::text(
                                    'youtube',
                                    old('youtube', $settings['youtube'] ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-6 pt-2">
                                {!! Form::label('facebook', __('lang.facebook')) !!}
                                {!! Form::text(
                                    'facebook',
                                    old('facebook', $settings['facebook'] ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-6 pt-2">
                                {!! Form::label('email', __('lang.email')) !!}
                                {!! Form::email(
                                    'email',
                                    old('email', $settings['email'] ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-12 pt-2">
                                {!! Form::label('phone', __('lang.phone')) !!}
                                {!! Form::number(
                                    'phone',
                                    old('phone', $settings['phone'] ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-md-12 pt-2">
                                {!! Form::label('vodafone_number', __('lang.vodafone_number')) !!}
                                {!! Form::number(
                                    'vodafone_number',
                                    old('vodafone_number', $settings['vodafone_number'] ?? ''),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>

                            <div class="col-sm-12 col-md-12 pt-4">
                                {!! Form::label('logo', __('lang.logo')) !!}
                                <img height="50" width="50" class="rounded-circle image-preview-1 position-relative" alt=""
                                    src="{{ asset($settings['logo'] ?? '') }}">
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
