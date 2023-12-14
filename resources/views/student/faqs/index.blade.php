@extends('student.layouts.master')

@php
    $title = __('lang.faqs');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('css')
    <style>
        .accordion-container {
            width: 100%;
        }

        .accordion-item {
            background-color: #FFFFFF;
            /* White background for items */
            border: 1px solid #E0E0E0;
            /* Light border */
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Softer shadow */
        }

        .accordion-header {
            background-color: #6C63FF;
            /* Soft purple */
            color: #FFFFFF;
            /* White text */
            padding: 15px;
            font-size: 18px;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px 8px 0 0;
            transition: background-color 0.3s ease;
        }

        .accordion-header:hover {
            background-color: #5753C9;
            /* Darker shade of purple */
        }

        .accordion-content {
            background-color: #FAFAFA;
            /* Very light grey for content */
            overflow: hidden;
            padding: 0 15px;
            max-height: 0;
            transition: max-height 0.3s ease;
        }

        .accordion-content p {
            margin: 15px 0;
            line-height: 1.5;
        }

        .icon {
            transition: transform 0.3s ease;
        }

        .active .icon {
            transform: rotate(45deg);
        }
    </style>
@endsection



@section('content')
    @include('student.layouts.includes.breadcrumb', ['title' => $title])

    @component('student.layouts.includes.card')
        @slot('content')
            <form action="{{ route('student.faqs.index') }}" method="get">
                <div class="row">

                    <div class="col-sm-12 col-md-6 pt-2">
                        {!! Form::label('search', __('lang.search')) !!}
                        {!! Form::text('search', request()->search, [
                            'class' => 'form-control',
                            'placeholder' => __('lang.search_by') . ' ' . __('lang.title'),
                        ]) !!}
                    </div>

                    <div class="col-sm-4 col-md-4 pt-4">
                        <button type="submit" class="btn btn-outline-info"> <i class="ti ti-filter"></i>
                            {{ __('lang.filter') }}</button>
                        <a href="{{ route('student.faqs.index') }}" class="btn btn-outline-dark"> <i class="ti ti-refresh "></i>
                            {{ __('lang.clear') }}</a>
                    </div>
                </div>
            </form>
        @endslot
    @endcomponent



    <div class="accordion-container">

        @if (auth()->user()->wallet()->value <= 0)
            <div class="alert alert-danger" role="alert">
                {{ __('lang.not_enough_balance') }}

                <a role="button" class="btn btn-primary"
                    href="{{ route('front.withdraw') }}">{{ __('lang.withdraw_request') }}</a>
            </div>
        @else
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <button class="accordion-header">
                        {{ $faq->question }}<span class="icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        @endif


    </div>


    <div class="modal fade table-modal" id="table-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>
@endsection


@section('js')
    <script>
        document.querySelectorAll('.accordion-header').forEach(button => {
            button.addEventListener('click', () => {
                const accordionContent = button.nextElementSibling;

                button.classList.toggle('active');

                if (button.classList.contains('active')) {
                    accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
                } else {
                    accordionContent.style.maxHeight = 0;
                }

                // Close other open accordion items
                document.querySelectorAll('.accordion-header').forEach(otherButton => {
                    if (otherButton !== button) {
                        otherButton.classList.remove('active');
                        otherButton.nextElementSibling.style.maxHeight = 0;
                    }
                });
            });
        });
    </script>
@endsection
