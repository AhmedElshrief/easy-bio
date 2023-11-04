<form action="{{ route('admin.admins.index') }}" method="get">
    <div class="row">

        <div class="col-sm-12 col-md-6 pt-2">
            {!! Form::label('search',__('lang.search') ) !!}
            {!! Form::text('search', request()->search, ["class"=>'form-control', "placeholder"=> __('lang.search_by').' '. __('lang.email').' '. __('lang.or') . ' ' . __('lang.name') .' '. __('lang.or') . ' ' . __('lang.phone')]) !!}
        </div>

        <div class="col-sm-4 col-md-4 pt-4">
            <button type="submit" class="btn btn-outline-info"> <i class="ti ti-filter"></i> {{ __('lang.filter') }}</button>
            <a href="{{ route('admin.admins.index') }}" class="btn btn-outline-dark"> <i class="ti ti-refresh "></i> {{ __('lang.clear') }}</a>
        </div>
    </div>
</form>
