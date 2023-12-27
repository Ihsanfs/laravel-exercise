<!DOCTYPE html>
<html>

<head>
    <title>Movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>


        body {
            font-family: Arial, sans-serif;
            background-color: rgb(219, 98, 98)
        }
    </style>
</head>

<body>
    <div class="container mt-2">


<form action="{{route('carifilm')}}" method="GET" class="d-flex fixed-top mt-2" >
    <input type="text" name="carifilm" class="form-control mr-2 " autocomplete="off"
        placeholder="Search movies">
    <button type="submit" class="btn btn-warning"> <i class="fas fa-search"></i></button>
</form>
        <div class="row ">
            @foreach ($movieData as $movie)
                <div class="col-md-4 mt-2">
                    <div class="card bg-light">
                        <div class="card-body mt-4">
                            <div class="movie">

                                <div class="card-title ">
                                    <h2 class="text-center">{{ $movie['title'] }}</h2>

                                </div>
                                @if(isset($movie['poster_path']))
                                    <img  class="card-img-top rounded "  src="https://image.tmdb.org/t/p/w200{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }} Poster">
                                @else
                                    <p>No poster available</p>
                                @endif
                                <p class="card-text mt-2">Overview :</p>
                                <p>{{ $movie['overview'] }}</p>
                                <p class="card-text"><span class="badge badge-info">Release :</span> {{ $movie['release_date'] }}</p>

                                <p class="card-text"><span class="badge badge-info">Popularity:</span> {{ $movie['popularity'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>







</body>

</html>
