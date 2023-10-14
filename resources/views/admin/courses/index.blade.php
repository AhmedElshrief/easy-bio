@extends('admin.layouts.master')

@php
    $title = __('lang.courses');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', ['title' => $title])

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('tool')
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary float-end mb-2">
                        <i class="ti ti-plus"></i> {{ __('lang.add') . ' ' . __('lang.course') }}
                    </a>
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.title') }}</td>
                            <td>{{ __('lang.level') }}</td>
                            <td>{{ __('lang.description') }}</td>
                            <td>{{ __('lang.active') }}</td>
                            <td>{{ __('lang.actions') }}</td>
                        @endslot

                        @slot('data')
                            @if (count($courses) > 0)
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img class="rounded-circle" src="{{ $course->image_path }}" alt="" width="50" height="50">
                                            {{ $course->title ?? '' }}
                                        </td>
                                        <td>{{ $course->level->name ?? '' }}</td>
                                        <td>{{ $course->description ?? '' }}</td>
                                        <td>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <label class="switch">
                                                        <input onclick="changeActive(this,{{ $course->id }})"
                                                            data-active="{{ $course->active }}" class="form-check-input"
                                                            {{ optional($course)->active ? 'checked' : '' }} type="checkbox">
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.courses.edit', $course->id) }}"
                                                class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                            <a data-href="{{ route('admin.courses.destroy', $course->id) }}"
                                                class="btn btn-danger sw-alert btn-sm"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        @include('admin.layouts.includes.alert')
                                    </td>
                                </tr>
                            @endif
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $courses->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection


@section('js')
    <script>
        function changeActive(el, id) {
            $(el).off('change').on('change', function() {
                const value = $(el).data('active') === 0 ? 1 : 0;
                $(el).data('active', value);
                $.post("{{ route('admin.courses.changeActive') }}", {
                    'id': id,
                    'value': value,
                    '_token': "{{ csrf_token() }}"
                }, function(results) {
                    const alertType = results.success ? "success" : "error";
                    swal.fire("", results.message, alertType);
                });
            });
        }

    </script>
@endsection


