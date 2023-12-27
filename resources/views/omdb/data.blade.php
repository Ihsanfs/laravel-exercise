<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="container">
@foreach ($data->Search as $movie)


    <div class="d-inline-flex p-2 bd-highlight">
        <div class="content">
            <div class="card" style="width: 18rem;">
                <div class="row">

                    <div class="col-md-6 col-2">
                        <figure class="movie-poster"><img class="card-img-top-center"src="{{ $movie->Poster }}"></figure>
                    </div>

                    <div class="col-md-8 ">
                        <h5>{{ $movie->Title }}</h5>
                         <h6>{{ $movie->Year }}</h6>
                        {{ $movie->Type }}

                </div>
                </div>
            </div>
            </div>

        </div>

@endforeach
</div>
<script>
    $(document).ready(function() {
        $("form").submit(function() {
            $(".loading").show();
        });
    });

    $(document).ajaxStop(function() {
        $(".loading").hide();
    });
</script>
