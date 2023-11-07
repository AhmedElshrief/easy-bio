@php
    $title = __('lang.approve');
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

            <form class="form"
                action="{{ $wallet->id ? route('admin.wallet_transactions.update', $wallet->id) : route('admin.wallet_transactions.store') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @if ($wallet->id)
                    @method('PATCH')
                @endif

                <input type="number" name="model_id" value="{{ $model_id }}" hidden>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                                <label for="amount"> {{ __('lang.amount') }} </label>
                                @php
                                    $amount = \App\Models\WithdrawRequest::where('user_id', $model_id)
                                        ->where('status', \App\Models\WithdrawRequest::PENDING)
                                        ->first()->amount;
                                @endphp
                                {!! Form::text('amount', old('amount', $amount), [
                                    'class' => 'form-control',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="note"> {{ __('lang.notes') }} </label>
                                {!! Form::text('note', old('note', $wallet->note), [
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
