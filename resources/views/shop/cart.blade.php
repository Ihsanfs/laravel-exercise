@extends('shop.shop')

@section('content')
<form action="{{ route('store.cart.product') }}" method="POST">
        @csrf
        <table id="cart" class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop untuk menampilkan produk yang ada di keranjang -->
                @php
                    $totalPrice = 0;
                @endphp
                @php $total = 0 @endphp

                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <tr rowId="{{ $id }}">
                            <td>{{$id}}</td>
                            <td data-th="Product">

                                <div class="row">

                                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" class="card-img-top"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">Rp. {{ number_format($details['price'], 2) }}</td>
                            <td data-th="Quantity" class="text-center">{{ $details['jumlah'] }}</td>
                            <td data-th="Subtotal" class="text-center">Rp. {{ number_format($details['jumlah'] * $details['price'], 2) }}</td>
                            <td class="actions">
                                <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @php
                            $subtotal = $details['jumlah'] * $details['price'];
                            $totalPrice += $subtotal;
                        @endphp
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total:</th>
                    <th class="text-info text-center">Rp. {{ number_format($totalPrice, 2) }}</th>
                    <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                    <th></th>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <button type="submit" class="btn btn-danger">Checkout</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
@endsection


@section('scripts')
<script type="text/javascript">

    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.sopping.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("rowId"),
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".delete-product").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("apakah ingin membatalkan ?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection

