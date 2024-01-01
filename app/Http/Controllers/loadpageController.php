<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use Illuminate\Http\Request;

class loadpageController extends Controller
{
public function index(Request $request){

    $produk = Produks::paginate(3);
    if($request->ajax()){
        $html = view('produk.index', compact('produk'))->render();
        return response()->json(['html' => $html]);
    }
    return view('produk.index', compact('produk'));
}

public function loaddata(Request $request){
    $produk = Produks::paginate(3);

    if($request->ajax()){
        $html = view('produk.index', compact('produk'))->render();
        return response()->json(['html' => $html]);
    }

    return $produk;
}
}
