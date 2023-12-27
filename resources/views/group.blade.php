<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <style>
        .year-group ul.list-group {
            box-sizing: border-box;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <h1>Data Pengguna Berdasarkan Tahun</h1>
    <div class="mt-3 col-md-3">


    <select id="year-select" name="years" class="form-select bg-warning">
        <option value="">Pilih Tahun / semua</option>
        @foreach ($years as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
</div>
    <div class="year-group">
        <h2>Tahun: Semua</h2>
        <ul class="list-group">
            @foreach ($users as $user)
                <li class="list-group-item mt-2">{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>

</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#year-select').on('change', function() {
                var year = $(this).val();
                var url = "{{ route('groupsearch') }}";

                if (year === "") {
                    $('.year-group h2').html('Tahun: Semua');
                    $('.year-group ul').empty();
                    displayDefaultData();
                    return;
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        year: year,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                        $('.year-group ul').addClass('animate__animated animate__fadeOut');
                    },
                    success: function(response) {
                        var html = '';

                        $.each(response, function(index, user) {
                            html += '<li class="list-group-item mt-2">' + user.name + '</li>';
                        });

                        $('.year-group h2').html('Tahun: ' + year);
                        $('.year-group ul').html(html);
                        $('.year-group ul').addClass('animate__animated animate__fadeIn');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    },
                    complete: function() {
                        $('.year-group ul').removeClass('animate__animated animate__fadeOut');
                    }
                });
            });

            // Function to display default data
            function displayDefaultData() {
                var defaultHtml = '';

                @foreach ($users as $user)
                    defaultHtml += '<li class="list-group-item mt-2">{{ $user->name }}</li>';
                @endforeach

                $('.year-group ul').html(defaultHtml);
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#year-select').on('change', function() {
                var year = $(this).val();
                var url = "{{ route('groupsearch') }}";

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        year: year,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var html = '';

                        $.each(response, function(index, user) {
                            html += '<li>' + user.name + '</li>';
                        });

                        $('.year-group ul').html(html);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
