<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel Click Load More Data</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Laravel 10 Click Load More Data</h1>

    <div id="data-wrapper">
        <div class="row" id="items_container">
        @include('load_more.data')
        </div>
    </div>

    <div class="col-md-12">
        <div class="text-center">
            <button id="load_more_button" data-page="{{ $posts->currentPage() + 1 }}"
                class="btn btn-primary">Load More</button>
        </div>
    </div>

    <div class="text-center" id="auto-load" style="display: none;">
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                {{-- <span>Loading...</span> --}}
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        var start = {{$posts->count()}};
        var load = $('#auto-load').html();
        $('#load_more_button').click(function() {
            $.ajax({
                url: "{{ route('loadmoredata') }}",
                method: "GET",
                data: {
                    start: start
                },
                dataType: "json",
                beforeSend: function() {
                    $('#load_more_button').html(load);
                    $('#load_more_button').attr('disabled', true);
                },
                success: function(data) {

                    if (data.data.length > 0) {
                        var html = '';
                        for (var i = 0; i < data.data.length; i++) {
                            html += `<div class="col-4 mt-2 mb-2">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title">` + data.data[i].id + ` : </h5>
                                            <p class="card-text">` + data.data[i].name + `</p>
                                        </div>
                                        <div>
                                            </div>
                                        </div>
                                    </div>`;
                        }
                        //console.log(html);
                        //append data  without fade in effect
                        // $('#items_container').append(html);

                        //append data with fade in effect
                        $('#items_container').append($(html).hide().fadeIn(3000));
                        $('#load_more_button').html('Load More');
                        $('#load_more_button').attr('disabled', false);
                        start = data.next;
                    } else {
                        $('#load_more_button').html('No More Data Available');
                        $('#load_more_button').attr('disabled', true);
                    }
                }
            });
        });
    });
</script>
</body>
</html>
