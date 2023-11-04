@extends('admin.layouts.master')

@php
    $title = __('lang.lessons');
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
                    @include('admin.lessons.filter')
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-md-12">
            @component('admin.layouts.includes.card')
                @slot('tool')
                    <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary float-end mb-2">
                        <i class="ti ti-plus"></i> {{ __('lang.add') . ' ' . __('lang.lesson') }}
                    </a>
                @endslot

                @slot('content')
                    @component('admin.layouts.includes.table')
                        @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.title') }}</td>
                            <td>{{ __('lang.lecture') }}</td>
                            <td>{{ __('lang.price') }}</td>
                            <td>{{ __('lang.hours') }}</td>
                            {{-- <td>{{ __('lang.vimeo_embed') }}</td> --}}
                            <td>{{ __('lang.description') }}</td>
                            <td>{{ __('lang.active') }}</td>
                            <td>{{ __('lang.actions') }}</td>
                        @endslot

                        @slot('data')
                            @if (count($lessons) > 0)
                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img class="rounded-circle" src="{{ $lesson->image_path }}" alt="" width="50"
                                                height="50">
                                            {{ $lesson->title ?? '' }}
                                        </td>
                                        <td>{{ $lesson->lecture->title ?? '' }}</td>
                                        <td>{{ $lesson->price ?? '' }}</td>
                                        <td>{{ $lesson->hours ?? '' }}</td>
                                        {{-- <td>{{ $lesson->vimeo_embed ?? '' }}</td> --}}
                                        <td>{{ $lesson->description ?? '' }}</td>
                                        <td>
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <label class="switch">
                                                        <input onclick="changeActive(this,{{ $lesson->id }})"
                                                            data-active="{{ $lesson->active }}" class="form-check-input"
                                                            {{ optional($lesson)->active ? 'checked' : '' }} type="checkbox">
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-href="{{ route('admin.lessons.show', $lesson->id) }}" data-container=".table-modal"
                                                class="btn btn-sm btn-modal btn-info"> <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="ti ti-pencil"></i></a>
                                            <a data-href="{{ route('admin.lessons.destroy', $lesson->id) }}"
                                                class="btn btn-danger sw-alert btn-sm"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        @include('admin.layouts.includes.alert')
                                    </td>
                                </tr>
                            @endif
                        @endslot
                    @endcomponent
                    <div class="d-flex justify-content-center mt-4">
                        {{ $lessons->links() }}
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="modal fade table-modal" id="table-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>

@endsection


@section('js')
    <script>
        function changeActive(el, id) {
            $(el).off('change').on('change', function() {
                const value = $(el).data('active') === 0 ? 1 : 0;
                $(el).data('active', value);
                $.post("{{ route('admin.lessons.changeActive') }}", {
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
