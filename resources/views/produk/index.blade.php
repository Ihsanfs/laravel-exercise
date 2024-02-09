<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Load More Data on Button Click using JQuery Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

    <div class="container mt-5">
        <h1>Laravel 10 Click Load More Data</h1>

        <div id="data-wrapper">
            <div class="row">
            @include('produk.data')
            </div>
        </div>

        <div class="row text-center" style="padding:20px;">
            <button class="btn btn-success load-more-data">Load More Data...</button>
        </div>

        <div class="auto-load text-center" style="display: none;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span>Loading...</span>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var ENDPOINT = "{{ route('loadpage') }}";
    var page = 1;

    $(".load-more-data").click(function(){
        page++;
        infinteLoadMore(page);
    });

    /*------------------------------------------
    --------------------------------------------
    call infinteLoadMore()
    --------------------------------------------
    --------------------------------------------*/
    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                console.log(response);
                if (response.html == '') {
                    $('.auto-load').text("End :(");
                    return;
                }
                // $('.auto-load').hide();
                $("#data-wrapper").append("<div class='row'>" + response.html + "</div>");
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
</body>
</html>
