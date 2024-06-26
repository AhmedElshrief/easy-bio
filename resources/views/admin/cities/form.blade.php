@php
    $title = $city->id ?  __('lang.edit') .' ' . __('lang.city')   : __('lang.add') .' ' . __('lang.city');
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

        <form class="form" action="{{ $city->id ? route('admin.cities.update',$city->id):route('admin.cities.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($city->id)
                @method('PUT')
            @endif

            <div class="modal-body">
                <div class="row">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <div class="col-md-12 pt-2">
                            <div class="form-group">
                                <label for="name">
                                    {{ __('lang.'.$locale.'.name') }}
                                </label>
                                {!! Form::text("{$locale}[name]", old("{$locale}[name]", optional($city->translate($locale))->name), ['class' => 'form-control']) !!}
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
