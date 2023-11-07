@php
    $title = __('lang.edit_wallet');
@endphp

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ $title }}
            </h5>
            <button type="button" class="btn-close {{ isRtl() ? 'ms-1' : '' }}" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form class="form" action="{{ route('admin.students.update-wallet', $wallet->id) }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                                <label for="value"> {{ __('lang.wallet_value') }} </label>
                                {!! Form::number("value", old("value", $wallet->value), [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
                </div>
            </form>

        </div>

    </div>
</div>
