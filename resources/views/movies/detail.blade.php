<!DOCTYPE html>
<html>
<head>
    <title>Movie Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

          <style>
            .card {
              margin-bottom: 20px;
            }

            body{
                background-color: black
            }
            </style>
        </head>
<body>
    <div class="continer d-flex mt-2">
    <h1 class="p-3 mb-2 bg-transparent text-white">Movie Detail</h1>
    <div class="container d-flex align-items-center mt-2">

        @if ($detail)
            <div class="col-sm-5">
                <div class="card mb-3">
                    <img src="{{ $detail['Poster'] }}" class="card-img-top mx-auto" alt="Movie Poster">
                    <div class="card-body">
                        <h5 class="card-title">{{ $detail['Title'] }}</h5>
                        <p class="card-text">Year: {{ $detail['Year'] }}</p>
                        <p class="card-text">Genre: {{ $detail['Genre'] }}</p>
                        <p class="card-text">Plot: {{ $detail['Plot'] }}</p>
                        <p class="card-text">Director: {{ $detail['Director'] }}</p>
                        <p class="card-text">Actors: {{ $detail['Actors'] }}</p>
                    </div>
                </div>
                <a href="{{ route('movies.index') }}" class="btn btn-primary mb-2">Back to Movies</a>
            </div>
        @else
            <p>No movie detail found.</p>
        @endif
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
