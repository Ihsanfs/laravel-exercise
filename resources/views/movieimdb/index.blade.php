<!DOCTYPE html>
<html>

<head>
    <title>Movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            border: 12px solid #ee0b0b;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: black
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="container-fluid">
            <h1 class="text-center">Movie Search</h1>

            <form action="{{ route('movies.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control mr-2" autocomplete="off" placeholder="Search movies">
                <button type="submit" class="btn btn-warning"><i class="fas fa-search"></i></button>
            </form>

            <div class="row justify-content-center mt-3">
                @if (count($paginatedMovies) > 0)
                    @foreach ($paginatedMovies as $movie)
                        <div class="col-sm-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $movie['image'] }}" alt="Film 1">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $movie['title'] }}</h4>
                                    <hr>
                                    {{-- <span class="card-text">{{ $movie['crew'] }}</span> --}}
                                    {{-- <a href="{{ route('movies.show', $movie['imdbID']) }}" class="btn btn-primary">Detail</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach


                @else
                    <p>No movies found.</p>
                @endif
                <div class="d-flex justify-content-center mt-4">
                    @if ($paginatedMovies->lastPage() > 1)
                        {{ $paginatedMovies->appends(Request::except('page'))->render('movieimdb.custom-pagination') }}
                    @endif
                </div>

            </div>
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



