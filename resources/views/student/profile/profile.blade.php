@php
    $title = __('lang.profile');
@endphp

@extends('student.layouts.master')

@section('title')
    {{ $title }}
@stop


@section('content')

    <!-- Page Header -->
    @include('student.layouts.includes.breadcrumb', ['title' => $title])
    <!-- /Page Header -->


    <div class="edit-profile">
        <form action="{{ route('student.profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-4">
                    @component('student.layouts.includes.card')
                        @slot('content')
                            <div class="row mb-2">
                                <div class="text-center">
                                    <img class="rounded-circle image-preview-image position-relative" width="200" height="200"
                                        alt="" src="{{ $resource->image_path  }}">
                                    <label for="fileid" style="left: 46%;top: 55%;" class="position-absolute fw-bolder fs-6">
                                        <span class="ti ti-upload"></span>
                                    </label>
                                    <input type="file" onchange="changeImage(this, 'image')" id="fileid" style="display: none" class="image form-control"
                                        name="image">

                                </div>
                                <div class="profile-title text-center mb-3 mt-5">
                                    <div class=" text-center">
                                        <div class="media-body text-center">
                                            <h5 class="mb-1">{{ $resource->username }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <b class="form-label">{{ __('lang.email') }} :</b>
                                    <span>{{ $resource->email }}</span>
                                </div>
                                <div class="mb-3">
                                    <b class="form-label">{{ __('lang.phone') }} :</b>
                                    <span>{{ $resource->phone }}</span>
                                </div>
                            </div>
                        @endslot
                    @endcomponent

                </div>
                <div class="col-xl-8">
                    @component('student.layouts.includes.card', ['title' => __('lang.edit_profile')])
                        @slot('content')
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('lang.name') }}</label>
                                        <input class="form-control" type="text" name="name" value="{{ $resource->name }}"
                                            placeholder="name">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('lang.username') }}</label>
                                        <input class="form-control" type="text" name="username" value="{{ $resource->username }}"
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('lang.email') }}</label>
                                        <input class="form-control" name="email" value="{{ $resource->email }}" type="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('lang.phone') }}</label>
                                        <input class="form-control" name="phone" value="{{ $resource->phone }}" type="number"
                                            step="any" placeholder="0123456789">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('lang.password') }}</label>
                                        <input class="form-control" name="password" type="password" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('lang.password_confirmation') }}</label>
                                        <input class="form-control" name="password_confirmation" type="password"  autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="col-sm-12 ">
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-block"
                                            type="submit">{{ __('lang.update_profile') }}</button>
                                    </div>
                                </div>


                            </div>
                        @endslot
                    @endcomponent

                </div>

            </div>
        </form>
    </div>

@stop
