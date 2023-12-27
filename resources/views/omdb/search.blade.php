
   @foreach($data->Search as $movie)

    <h2>{{ $movie->Title }}</h2>
    <p>{{ $movie->Year }}</p>
    <p>{{ $movie->Type }}</p>
    <br>

@endforeach
