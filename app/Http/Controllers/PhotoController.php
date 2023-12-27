<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;
use GuzzleHttp\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;

class PhotoController extends Controller

{

    public function index(){


        // $response =
        // Http::get('http://www.omdbapi.com/?i=tt3896198&apikey=c9463472');
        //  $res = json_decode($response, true);
        // $obj = json_encode($res, true);

//    $response = Http::withHeaders([
//     'apikey' => 'c9463472',
//     'i' => 'tt3896198'
// ])->get('http://omdbapi.com', [
//     'name' => 'Taylor',
// ]);

// $data = json_decode($response, true);
//    dd($data);

//    return response($data);


        $photo = DB::table('photos')
        ->leftJoin('studio', 'studio.id', '=', 'photos.id')
        ->get();
        return view ('photo',['photos'=>$photo]);

    }
    public function create(){
        return view('create');
    }


    public function store(Request $request){




        // tap(Photo::insert([
        //     'nama' => $request->nama,
        //                     'alamat' => $request->alamat,
        //                     'jenis' => $request->jenis,
        //                     'kode_id' => $request->kode_id,
        //                     'created_at' => now(),
        //                     //  'updated_at' => now(),
        //                     ]));
        // DB::table('photos')->insert([
        //                 'nama' => $request->nama,
        //                 'alamat' => $request->alamat,
        //                 'jenis' => $request->jenis,
        //                 'kode_id' => $request->kode_id,
        //                 'created_at' => now(),
        //                 //  'updated_at' => now(),
        //                 ]);
        return back();
    }
}
