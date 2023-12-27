<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <form class="form-inline" action="{{route('qr.store')}}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                </div>
                <div class="form-group mb-2 ml-1">
                    <input type="text" class="form-control" name="price" placeholder="Masukkan harga">
                </div>
                {{-- <div class="form-group mb-2 ml-1">
                    <input type="number" class="form-control" name="phone" placeholder="Masukkan Nomor Telephone">
                </div> --}}
                <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
            </form>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Qr code</th>
                        <th scope="col">QR code generate</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->price }}</td>
                        <td style="width: 50px; height: 50px;">{!! $data->qr !!}</td>


                        <td>
                            <div id="qrcode{{ $data->id }}"></div>
                        </td>
                        <td>
                            <button class="btn btn-primary generate-btn" data-id="{{ $data->id }}" data-name="{{ $data->name }}">Generate</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.generate-btn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');

                var qrCodeDiv = $('#qrcode' + id);

                // Hapus QR code sebelumnya jika ada
                qrCodeDiv.empty();

                // Generate QR code baru
                var qrcode = new QRCode(qrCodeDiv[0], {
                    text: 'QR code for ' + id + ' - ' + name,
                    width: 100,
                    height: 100
                });
            });
        });
    </script>
</body>
</html>
