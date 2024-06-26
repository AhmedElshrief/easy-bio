@extends('admin.layouts.master')

@php
    $title = __('lang.students');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb', ['title' => $title])

    <div class="row">
        <div class="col-md-12">

            @component('admin.layouts.includes.card', ['id' => 'filter_body'])
                @slot('tool')
                    <button class="btn btn-xs btn-success {{ isRtl() ? 'float-start' : 'float-end' }}"
                        onclick="$('#filter_body').slideToggle()">
                        <i class="ti ti-filter"></i>
                    </button>
                @endslot

                @slot('content')
                    @include('admin.students.filter')
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('tool')
                    <a href="{{ route('admin.students.create') }}" class="btn btn-primary float-end m-2">
                        <i class="ti ti-plus"></i> {{ __('lang.add') . ' ' . __('lang.student') }}
                    </a>
                    <a href="{{ route('admin.students.trashlist') }} " class="btn btn-danger float-end m-2">
                        <i class="ti ti-trash"></i> {{ __('lang.trashlist') }}
                    </a>
                    <a data-href="{{ route('admin.students.delete-students') }}" onclick="submitForm(this)"
                        class="btn btn-danger float-end m-2">
                        <i class="ti ti-trash"></i> {{ __('lang.delete_students') }}
                    </a>
                    <a data-href="{{ route('admin.students.reset-wallets') }}" id="reset_wallet" onclick="resetWallets(this)"
                        class="btn btn-info float-end m-2">
                        <i class="ti ti-reset"></i> {{ __('lang.reset_wallets') }}
                    </a>

                    <a data-href="{{ route('admin.students.active-students') }}" onclick="submitForm(this)"
                        class="btn btn-info float-end m-2">
                        <i class="ti ti-reset"></i> {{ __('lang.active_students') }}
                    </a>

                    <a data-href="{{ route('admin.students.deactive-students') }}" onclick="submitForm(this)"
                        class="btn btn-info float-end m-2">
                        <i class="ti ti-reset"></i> {{ __('lang.deactive_students') }}
                    </a>
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td></td>
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
                                            <td>
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-group">
                                                        <label class="switch">
                                                            <input onclick="changeActive(this,{{ $student->id }})"
                                                                data-status="{{ $student->status }}"
                                                                {{ $student->status == \App\Models\User::ACTIVE ? 'checked' : '' }}
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
                                                <a data-href="{{ route('admin.students.edit-wallet', $student->wallet()->id) }}"
                                                    data-container=".table-modal" class="btn btn-primary btn-sm mb-2 btn-modal"><i
                                                        class="ti ti-pencil"></i>
                                                    {{ __('lang.edit_wallet') }}
                                                </a>
                                                <a href="{{ route('admin.students.edit', $student->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                                <a data-href="{{ route('admin.students.destroy', $student->id) }}"
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


    <div class="modal fade table-modal" id="table-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>

@endsection


@section('js')
    <script>
        function resetWallets(el) {
            let value = prompt("{{ __('lang.enter_value_to_reset_wallets') }}");

            if (value == null || value == "") {
                alert("{{ __('lang.enter_valid_value') }}");
                return;
            }
            $('#list_form').append('<input type="hidden" name="value" value="' + Number(value) + '">');
            $('#list_form').attr('action', $(el).data('href'));
            $('#list_form').submit();
        }

        function changeActive(el, id) {
            $(el).off('change').on('change', function() {
                let value = 'blocked';
                if ($(el).data('status') == 'blocked') {
                    value = 'active';
                    $(el).data('status', value);
                } else if ($(el).data('status') == 'active') {
                    value = 'blocked';
                    $(el).data('status', value);
                }
                $.post("{{ route('admin.students.changeStatus') }}", {
                    'id': id,
                    'value': value,
                    '_token': "{{ csrf_token() }}"
                }, function(results) {
                    const alertType = results.success ? "success" : "error";
                    swal.fire("", results.message, alertType);
                });
            });
        }

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
