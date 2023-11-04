<form action="{{ route('admin.lectures.index') }}" method="get" id="">
    <div class="row">

        <div class="col-sm-12 col-md-4 pt-2">
            {!! Form::label('search',__('lang.search') ) !!}
            {!! Form::text('search', request()->search, ["class"=>'form-control', "placeholder"=> __('lang.search_by').' '. __('lang.title')]) !!}
        </div>

        <div class="col-sm-12 col-md-4 pt-2">
            {!! Form::label('course_id',__('lang.course') ) !!}
            {!! Form::select('course_id', $courses, request()->course_id, ["class"=>'form-select', 'placeholder'=>__('lang.select_item')]) !!}
        </div>

        <div class="col-sm-12 col-md-4 pt-2">
            {!! Form::label('active',__('lang.active') ) !!}
            <select name="active" id="" class="form-select">
                <option disabled hidden selected value="">{{ __('lang.select_item') }}</option>
                <option {{ request()->active == 'active' ? 'selected' :'' }} value="active">{{ __('lang.active') }}</option>
                <option {{ request()->active == 'inactive' ? 'selected' :'' }} value="inactive">{{ __('lang.inactive') }}</option>
            </select>
        </div>

        <div class="col-sm-4 col-md-4 pt-4">
            <button type="submit" class="btn btn-outline-info"> <i class="ti ti-filter"></i> {{ __('lang.filter') }}</button>
            <a href="{{ route('admin.lectures.index') }}" class="btn btn-outline-dark"> <i class="ti ti-refresh "></i> {{ __('lang.clear') }}</a>
        </div>
    </div>
</form>
