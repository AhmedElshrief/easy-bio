<form action="{{ route('admin.students.index') }}" method="get" id="">
    <div class="row">

        <div class="col-sm-12 col-md-4 pt-2">
            {!! Form::label('search',__('lang.search') ) !!}
            {!! Form::text('search', request()->search, ["class"=>'form-control', "placeholder"=> __('lang.search_by').' '. __('lang.email').' '. __('lang.or') . ' ' . __('lang.name') .' '. __('lang.or') . ' ' . __('lang.phone')]) !!}
        </div>
        <div class="col-sm-12 col-md-4 pt-2">
            {!! Form::label('status',__('lang.status') ) !!}
            <select name="status" id="" class="form-select">
                <option disabled hidden selected value="">{{ __('lang.select_item') }}</option>
                <option {{ request()->status == 'active' ?'selected' :'' }} value="active">{{ __('lang.active') }}</option>
                <option {{ request()->status == 'blocked' ?'selected' :'' }} value="blocked">{{ __('lang.inactive') }}</option>
            </select>
        </div>

        <div class="col-sm-4 col-md-4 pt-4">
            <button type="submit" class="btn btn-outline-info"> <i class="ti ti-filter"></i> {{ __('lang.filter') }}</button>
            <a href="{{ route('admin.students.index') }}" class="btn btn-outline-dark"> <i class="ti ti-refresh "></i> {{ __('lang.clear') }}</a>
        </div>
    </div>
</form>
