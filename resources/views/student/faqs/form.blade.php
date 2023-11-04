@php
    $title = $faq->id ?  __('lang.edit') .' ' . __('lang.faq')   : __('lang.add') .' ' . __('lang.faq');
@endphp

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">
          {{ $title }}
        </h5>
        <button type="button" class="btn-close {{ isRtl() ? 'ms-1' : '' }}" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form" action="{{ $faq->id ? route('admin.faqs.update',$faq->id):route('admin.faqs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($faq->id)
                @method('PUT')
            @endif

            <div class="modal-body">
                <div class="row">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                                <label for="question">
                                    {{ __('lang.'.$locale.'.question') }}
                                </label>
                                {!! Form::text("{$locale}[question]", old("{$locale}[question]", optional($faq->translate($locale))->question), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    @endforeach

                    @foreach (config('translatable.locales') as $key => $locale)
                    <div class="col-md-12 pt-2">
                        <div class="form-group">
                            <label for="answer">
                                {{ __('lang.'.$locale.'.answer') }}
                            </label>
                            {!! Form::text("{$locale}[answer]", old("{$locale}[answer]", optional($faq->translate($locale))->answer), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
            </div>
        </form>

      </div>

    </div>
  </div>
