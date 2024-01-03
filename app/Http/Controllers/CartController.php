<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartcheckout;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $books = Cart::all();

        return view('shop.product', compact('books'));
    }

    public function bookCart()
    {
        return view('shop.cart');
    }
    public function addBooktoCart(Request $request,$id)
    {

        $book = Cart::findOrFail($id);
        $quantity = $request->quantity;
        // dd($quantity);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            // $cart[$id]['quantity']++;
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $book->name,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image,
                "jumlah" => $quantity,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }

    public function storeproduct(Request $request){
        $totalPrice = $request->input('totalPrice');
        $cart = session('cart');

        foreach ($cart as $itemId => $itemDetails) {
            $cartItem = Cart::find($itemId);

            $checkout = new CartCheckout();
            $checkout->cart_id = $cartItem->id;
            $checkout->jumlah = $itemDetails['jumlah'];
            $checkout->price = $itemDetails['price'];
            $checkout->total_price = $totalPrice;
            $checkout->save();
        }
        session()->forget('cart');

        return redirect()->back()->with('success', 'Purchases have been saved successfully!');
    }

}
