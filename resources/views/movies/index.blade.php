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
                <input type="text" name="search" class="form-control mr-2" autocomplete="off"
                    placeholder="Search movies">
                <button type="submit" class="btn btn-warning"> <i class="fas fa-search"></i></button>
            </form>



            {{-- <h2>Results:</h2> --}}

            {{-- <p> {{ $movies['Title']}}</p> --}}
            <div class="row justify-content-center mt-3">
                @if (count($movies) > 0)
                    @foreach ($movies as $movie)
                        <div class="col-sm-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $movie['Poster'] }}" alt="Film 1">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $movie['Title'] }}</h4>
                                    <hr>
                                    <span class="card-text">{{ $movie['Year'] }}</span>
                                    <a href="{{ route('movies.show', $movie['imdbID']) }}"
                                        class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No movies found.</p>
                @endif
            </div>
            {{-- <form action="{{ route('movies.index') }}" method="GET" class="form-inline mb-4">
                <input type="text" name="search" id="search" class="form-control mr-2" placeholder="Search movies" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form> --}}

            {{-- <div id="searchResults">
                @include('movies.search')
            </div> --}}
            {{-- <button id="tombol">Klik untuk Tampilkan Data</button>

            <div id="hasil"></div> --}}
            {{-- <form action="{{ route('movies.index') }}" method="GET" class="form-inline mb-4">
                <input type="text" name="search" id="search" class="form-control mr-2" placeholder="Search movies" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <div id="searchResults"></div> --}}

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

<script>
    $(document).ready(function() {
        // Fungsi untuk melakukan permintaan pencarian saat halaman dimuat atau saat input pencarian diisi
        function performSearch() {
            var query = $('#search').val();
            if (query.length >= 3) {
                $.ajax({
                    url: "{{ route('movies.search') }}",
                    method: "GET",
                    data: { search: query },
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.length > 0) {
                            $.each(data, function(index, movie) {
                                html += '<div class="col-md-4">' +
                                    '<div class="card mb-4">' +
                                    '<img src="' + movie.Poster + '" class="card-img-top" alt="' + movie.Title + '">' +
                                    '<div class="card-body">' +
                                    '<h5 class="card-title">' + movie.Title + '</h5>' +
                                    '<p class="card-text">' + movie.Year + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            });
                        } else {
                            html = '<p>Tidak ada film yang ditemukan.</p>';
                        }
                        $('#searchResults').html(html);
                    }
                });
            } else {
                $('#searchResults').html('');
            }
        }

        // Panggil fungsi performSearch saat halaman dimuat
        performSearch();

        // Panggil fungsi performSearch saat input pencarian diubah
        $('#search').on('keyup', function() {
            performSearch();
        });
    });
</script>


    <script>
        $(document).ready(function() {
            $("#tombol").click(function() {
                $.get("http://www.omdbapi.com/?apikey=c3ab2e34&s=avengers", function(data) {
                    console.log(data);
                    var movies = data.Search;
                    var cards = "";

                    movies.forEach(function(movie) {
                        var card = `<div class="container-fluid">
            <div class="row justify-content-center mt-3">
            <div class="col-sm-4">
            <div class="card">
                          <img src="${movie.Poster}" class="card-img-top" alt="${movie.Title}">
                          <div class="card-body">
                          <h3>${movie.Title}</h3>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>`;
                        cards += card;
                    });

                    $("#hasil").html(cards);
                });
            });
        });
    </script>

    {{-- <script>
    $(document).ready(function(){
      $("#tombol").click(function(){
        $.get("http://www.omdbapi.com/?apikey=c3ab2e34&s=avengers", function(data){
          console.log(data);
          var titles = data.Search.map(function(movie) {
            return movie.Title;
          });
          var titlesText = titles.join(", ");
          $("#hasil").html("Judul Film: " + titlesText);
        });
      });
    });
  </script> --}}


</body>

</html>
