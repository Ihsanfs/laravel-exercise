@if(count($movies) > 0)
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $movie['Poster'] }}" class="card-img-top" alt="{{ $movie['Title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['Title'] }}</h5>
                        <p class="card-text">{{ $movie['Year'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Tidak ada film yang ditemukan.</p>
@endif
