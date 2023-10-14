@extends('admin.layouts.master')

@php
    $title = __('lang.students');
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
                    {{-- <a href="{{ route('admin.students.create') }}" class="btn btn-primary float-end mb-2">
                        <i class="ti ti-plus"></i> {{ __('lang.add') . ' ' . __('lang.student') }}
                    </a> --}}
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.name') }}</td>
                            <td>{{ __('lang.email') }}</td>
                            <td>{{ __('lang.phone') }}</td>
                            <td>{{ __('lang.parent_phone') }}</td>
                            <td>{{ __('lang.username') }}</td>
                            <td>{{ __('lang.status') }}</td>
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
                                            <img class="rounded-circle" src="{{ $student->image_path }}" alt="" width="50" height="50">
                                            {{ $student->title ?? '' }}
                                        </td>
                                        <td>{{ $student->email ?? '' }}</td>
                                        <td>{{ $student->phone ?? '' }}</td>
                                        <td>{{ $student->parent_phone ?? '' }}</td>
                                        <td>{{ $student->username ?? '' }}</td>
                                        <td>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <label class="switch">
                                                        <input onclick="changeActive(this,{{ $student->id }})"
                                                            data-status="{{ $student->status }}" {{  $student->status == \App\Models\User::ACTIVE ? 'checked' : '' }}
                                                            class="form-check-input" value="{{ $student->status }}" type="checkbox"
                                                            name="status">
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $student->level->name ?? '' }}</td>
                                        <td>{{ $student->city->name ?? '' }}</td>

                                        <td>
                                            <a href="{{ route('admin.students.edit', $student->id) }}"
                                                class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                            <a data-href="{{ route('admin.students.destroy', $student->id) }}"
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
                        {{ $students->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection


@section('js')
    <script>
        function changeActive(el, id) {
            $(el).on('change', function() {
                const value = ($(el).data('status') == 'active') ? 0 : 1;
                $(el).data('status', value);
                $.ajax({
                    url: "{{ route('admin.students.changeStatus') }}",
                    type: "POST",
                    data: {
                        'id': id,
                        'value': value,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(results) {
                        const alertType = results.success ? "success" : "error";
                        swal.fire("", results.message, alertType);
                    }
                });
            })
        }
    </script>
@endsection


