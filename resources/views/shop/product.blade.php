@extends('shop.shop')

@section('content')

<div class="row">
    @foreach($books as $book)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">{{ $book->name }}</h4>
                    {{-- <p>{{ $book->author }}</p> --}}
                    <img src="{{ asset('images') }}/{{ $book->image }}" class="card-img-top"/>
                    <p class="card-text"><strong>Price: </strong> Rp. {{ $book->price }}</p>
                    <form action="{{ route('addbook.to.cart', $book->id) }}" method="GET">
                        @csrf
                        <div class="mb-1">
                            <label for="quantity"> Jumlah</label>
                        <input type="number" name="quantity" value="1" min="1" class="form-control"> <!-- Input untuk jumlah buku -->
                    </div>
                        <button type="submit" class="btn btn-outline-danger form-control">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
