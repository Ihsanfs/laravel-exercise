@foreach ($produk as $post)
<div class="card mb-2">
    <div class="card-body">{{ $post->id }}
        <h5 class="card-title">{{ $post->price }}</h5>
        {!! $post->name!!}
    </div>
</div>
@endforeach
