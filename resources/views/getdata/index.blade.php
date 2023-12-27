<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>

    <button id="getdata">klik </button>
    <p id="dataku"></p>

    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      $(document).ready(function(){
  $("#getdata").click(function(){
    $.get("/ajax/testing", function(data, status){

        var artikel = '';

        $.each(data, function(i, item) {
            var tanggal = new Date(item.created_at);
        var tanggalStr = tanggal.getDate() + '-' + (tanggal.getMonth() + 1) + '-' + tanggal.getFullYear();

          artikel += item.judul + '<br>';
          artikel += '<p> isi artikel : ' + item.body + '<br></p> ' ;

          artikel += '<p>Tanggal: ' + tanggalStr + '</p><br>';


        });

        $("#dataku").html(artikel);

    });
  });
});

    </script>
</body>
</html>
