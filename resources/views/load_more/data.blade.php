@foreach ($posts as $post)
<div class="col-4 mt-2 mb-2">
    <div class="card">
      {{-- <img src="https://placehold.co/400x250" class="card-img-top" alt="..."> --}}
      <div class="card-body">
        <h5 class="card-title">{{ $post->id }}  : </h5>
        <p class="card-text">{{ $post->name }}</p>
      </div>
    </div>
</div>
@endforeach
