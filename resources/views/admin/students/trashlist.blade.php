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

    {{-- <div class="row">
        <div class="col-md-12">

            @component('admin.layouts.includes.card', ['title' => __('lang.filter'), 'id' => 'filter_body', 'icon' => true])
                @slot('tool')
                    <button class="btn btn-xs btn-success" onclick="$('#filter_body').slideToggle()">
                        <i class="ti ti-filter"></i>
                    </button>
                @endslot

                @slot('content')
                    @include('admin.students.filter')
                @endslot
            @endcomponent
        </div>
    </div> --}}

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
                                @foreach ($students as $student)
                                    <tr>
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
    </script>
@endsection
