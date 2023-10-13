<a href="{{ $item['url'] }}">
    <div class="card">
        <div class="card-body p-2 text-center">
           <img width="50px" src="{{ asset($item['image']) }}" alt=""> <br>
            <b class="card-title main-color fs-4">{{ $item['title'] }}</b>
            <p class="text-muted">
                {{ $item['description'] }}
            </p>
        </div>
    </div>
</a>
