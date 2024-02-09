<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;

class PerulanganController extends Controller
{
    public function index(){
        $data = artikel::all();
   return view('perulangan.index', compact('data'));
    }

    public function store(Request $request)
{
    $input = $request->judul;
    $input2 = $request->body;

    $id = $request->id;

    // update data multiple input
    // foreach ($input as $key => $judul) {
    //     $artikel = Artikel::find($id[$key]);
    //     $artikel->judul = $judul;

    //     $artikel->save();
    // }
  

    // //hanya looping berdasarkan id saya yang terupdate
    // foreach ($judulInput as $key => $judul) {
    //     $artikel = Artikel::find($id[$key]); // Mengambil objek artikel yang ingin diubah berdasarkan ID
    //     if ($artikel) {
    //         // Mengatur judul dan body artikel
    //         $artikel->judul = $judul;
    //         $artikel->body = $bodyInput[$key];
    //         $artikel->categoris_id = 1; // Misalnya kategori ID 1

    //         // Simpan perubahan ke dalam database
    //         $artikel->save();
    //     }
    // }
}

}
