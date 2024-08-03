@extends('admin.layouts.master')

@php
    $title = __('lang.students_trashlist');
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

    <div class="row">
        <div class="col-md-12">

            <a data-href="{{ route('admin.students.force-delete-students') }}" onclick="submitForm(this)"
                class="btn btn-danger float-end m-2">
                <i class="ti ti-trash"></i> {{ __('lang.delete_students') }}
            </a>

            <a data-href="{{ route('admin.students.restore-students') }}" onclick="submitForm(this)"
                class="btn btn-primary float-end m-2">
                <i class="ti ti-arrow-right"></i> {{ __('lang.restore_students') }}
            </a>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.name') }}</td>
                            <td>{{ __('lang.email') }}</td>
                            <td>{{ __('lang.phone') }}</td>
                            <td>{{ __('lang.parent_phone') }}</td>
                            <td>{{ __('lang.username') }}</td>
                            <td>{{ __('lang.level') }}</td>
                            <td>{{ __('lang.city') }}</td>
                            <td>{{ __('lang.actions') }}</td>
                        @endslot

                        @slot('data')
                            @if (count($students) > 0)
                            <input type="checkbox" class ="w3-check {{ isRtl() ? 'ms-2' : 'me-2' }}" id="select_all">
                            <label for="select_all">{{ __('lang.select_all') }}</label>
                            <form action="" method="post" id="list_form">
                                @csrf
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="w3-check" name="student_ids[]" value="{{ $student->id }}">
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img class="rounded-circle" src="{{ $student->image_path }}" alt="" width="50"
                                                height="50">
                                            {{ $student->name ?? '' }}
                                        </td>
                                        <td>{{ $student->email ?? '' }}</td>
                                        <td>{{ $student->phone ?? '' }}</td>
                                        <td>{{ $student->parent_phone ?? '' }}</td>
                                        <td>{{ $student->username ?? '' }}</td>
                                        <td>{{ $student->level->name ?? '' }}</td>
                                        <td>{{ $student->city->name ?? '' }}</td>

                                        <td>
                                            <a href="{{ route('admin.students.restore', $student->id) }}"
                                                class="btn btn-primary btn-sm" id="restore_item"><i
                                                class="ti ti-arrow-right"></i></a>
                                            <a data-href="{{ route('admin.students.hard-delete', $student->id) }}"
                                                class="btn btn-danger sw-alert btn-sm"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                            @else
                                <tr>
                                    <td colspan="10">
                                        @include('admin.layouts.includes.alert')
                                    </td>
                                </tr>
                            @endif
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $students->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection

@section('js')
    <script>
        $('#restore_item').on('click', function () {
            if(! confirm("{{ __('lang.are_you_sure_restore_student') }}")) {
                return false
            }
        })

        function submitForm(el) {
            if (!confirm("{{ __('lang.are_you_sure') }}")) {
                return false;
            }
            $('#list_form').attr('action', $(el).data('href'));
            $('#list_form').submit();
        }


        $('#select_all').on('change', function() {
            if ($(this).is(':checked')) {
                $('.w3-check').prop('checked', true);
            } else {
                $('.w3-check').prop('checked', false);
            }
        });
    </script>
@endsection
