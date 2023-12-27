<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('perulangan') }}" method="post">
        @method('post')
        @csrf

        @if(count($data) > 0)
        @foreach ($data as $key => $item)
            <input type="hidden" name="id[]" value="{{ $item->id }}">
            <input type="text" value="{{ $item->judul }}" name="judul[]">
            <input type="text" value="{{ $item->body }}" name="body[]">
        @endforeach
        <button type="submit">Simpan</button>
    @else
        <p>data anda tidak ada bro</p>
    @endif
    </form>


</body>
</html>
