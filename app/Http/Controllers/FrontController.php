<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    public function artikel_kategori(Categori $kategori)
    {
        $categori = categori::all();
        $artikel = artikel::latest()->get()->random(2);
        $c = categori::find(2)->first();
        dd($c);
        $artikelall = $kategori->artikel()->get();
        $artikelterkait = Artikel::latest()->limit(4)->get();

       return $categori;

    }

    public function cek(Request $request){

        $categori =categori::select('slug')->get();

        $data = DB::table('categoris')->select('slug','nama_kategori')->get();
$orders = DB::table('categoris')
                ->orderByRaw('updated_at - created_at DESC')
                ->get();
        dd($orders);
    }
}
