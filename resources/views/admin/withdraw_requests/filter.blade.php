<form action="{{ route('admin.withdraw_requests.index') }}" method="get">
    <div class="row">

        <div class="col-sm-12 col-md-6 pt-2">
            {!! Form::label('status',__('lang.status') ) !!}
            <select name="status" id="" class="form-select">
                <option disabled hidden selected value="">{{ __('lang.select_item') }}</option>
                <option {{ request()->status == 'pending' ? 'selected' : '' }} value="pending">{{ __('lang.pending') }}</option>
                <option {{ request()->status == 'refused' ? 'selected' : '' }} value="refused">{{ __('lang.refused') }}</option>
                <option {{ request()->status == 'approved' ? 'selected' : '' }} value="approved">{{ __('lang.approved') }}</option>
            </select>
        </div>

        <div class="col-sm-4 col-md-4 pt-4">
            <button type="submit" class="btn btn-outline-info"> <i class="ti ti-filter"></i> {{ __('lang.filter') }}</button>
            <a href="{{ route('admin.withdraw_requests.index') }}" class="btn btn-outline-dark"> <i class="ti ti-refresh "></i> {{ __('lang.clear') }}</a>
        </div>
    </div>
</form>
