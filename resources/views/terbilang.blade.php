<!DOCTYPE html>
<html>
<head>
    <title>Fungsi Terbilang dengan Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .btn-terbilang {
            margin-top: 20px;
        }
        .result {
            margin-top: 30px;
            font-size: 24px;
            color: #333;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('terbilang') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">Masukkan Angka Pertama:</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ str_replace('.', '', $number) ?? '' }}">

                <label for="number1">Masukkan Angka Kedua:</label>
                <input type="text" class="form-control" id="number1" name="number1" value="{{ str_replace('.', '', $number1) ?? '' }}">

                @error('number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-terbilang">Terbilang</button>
        </form>

        @if(isset($terbilang))
            <div class="result">
                @php
                    $formattedNumber = number_format($operasi, 0, ',', '.');
                @endphp
                <h4 class="font-weight-bold">Rp. {{ $formattedNumber }}</h4>
                <h6 class="mt-2">({{ ucwords($terbilang) }} Rupiah)</h6>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
