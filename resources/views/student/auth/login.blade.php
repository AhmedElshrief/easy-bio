@extends('student.auth.layouts.master')

@section('content')
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('student.home') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset($settings['logo'] ?? '') }}" width="80" alt="">
                            </a>
                            {{-- <p class="text-center"></p> --}}
                            <form action="{{ route('student.login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">{{ __('lang.username') }}</label>
                                    <input type="username" autocomplete="new-mail" placeholder="ahmed123" name="username" class="form-control @error('username') is-invalid @enderror" id="username" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">{{ __('lang.password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="********" id="exampleInputPassword1" autocomplete="new-password">
                                </div>
                                <div class="d-flex align-items-center justify-content-end mb-3">
                                    {{-- <div class="form-check">
                                        <input class="form-check-input primary" name="remember" type="checkbox" value=""
                                            id="flexCheckChecked" >
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            {{ __('student.remember_password') }}
                                        </label>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-1 rounded-2">{{ __('lang.login') }}</button>
                                </div>
                                <a href="{{ route('student.register') }}" class="btn btn-info w-100 py-8 fs-4 mb-2 rounded-2">{{ __('lang.create_account') }}</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
