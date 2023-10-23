@extends('admin.layouts.master')
@php
    $title = __('lang.admins');
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')

    @include('admin.layouts.includes.breadcrumb' , ['title' => $title])

    <div class="row pt-4">
        <div class="col-md-12">
           @component('admin.layouts.includes.card' )
               @slot('tool')
                   <a href="{{ route('admin.admins.create') }}" class="btn btn-primary float-end mb-2"> <i class="ti ti-plus"></i> {{ __('lang.add') . ' ' . __('lang.admin') }}</a>
               @endslot

               @slot('content')
                   @component('admin.layouts.includes.table')
                       @slot('headers')
                            <td>#</td>
                            <td>{{ __('lang.name') }}</td>
                            <td>{{ __('lang.role') }}</td>
                           <td>{{ __('lang.email') }}</td>
                           <td>{{ __('lang.phone') }}</td>
                           <td>{{ __('lang.actions') }}</td>
                       @endslot

                       @slot('data')
                           @if (count($data) > 0)
                               @foreach ($data as $item)
                                   <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $item->image_path }}" class="rounded-circle " width="30" alt="" />
                                            {{ $item->username ?? '' }}
                                        </td>
                                        <td>{{ $item->roles()->first()->display_name ?? '' }}</td>
                                        <td>{{ $item->email ?? '' }}</td>
                                        <td>{{ $item->phone ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.admins.edit', $item->id) }}"  class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>
                                            <a data-href="{{ route('admin.admins.destroy', $item->id) }}" class="btn btn-danger sw-alert btn-sm"><i class="ti ti-trash"></i></a>
                                        </td>
                                   </tr>
                               @endforeach
                           @else
                               <tr>
                                   <td colspan="4">
                                       @include('admin.layouts.includes.alert')
                                   </td>
                               </tr>
                           @endif
                       @endslot
                   @endcomponent
               @endslot
           @endcomponent
        </div>
    </div>

</div>
@endsection

