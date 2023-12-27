<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MovieController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = 'c3ab2e34';
        $query = $request->query('search');
        // $response = Http::get('http://www.omdbapi.com/', [
        //     'apikey' => 'c3ab2e34',
        //     't' => 'avengers'
        // ]);
        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}&s={$query}");

        $movies = $response->json()['Search'] ?? [];
        $responseData = $response->json();

        $movies = isset($responseData['Search']) ? $responseData['Search'] : [];

        // $input = "contoh.teks.dengan/titik dan garis bawah";
        // $replacedInput = str_replace(['.', '/'], ['_', '-'], $input);
        // echo $replacedInput;

        return view('movies.index', compact('movies'));
    }
public function search(Request $request)
{
    $apiKey = 'c3ab2e34';
    $query = $request->query('search');

    if ($query) {
        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}&s={$query}");
        $responseData = $response->json();
        $movies = isset($responseData['Search']) ? $responseData['Search'] : [];
    } else {
        $movies = [];
    }

    return response()->json($movies);
}



    public function show ($id){

        $apiKey = 'c3ab2e34';

        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}&i={$id}");
        $detail = $response->json();


        return view('movies.detail', compact('detail'));

    }

    public function edit(){

    }

    public function tambah(Request $request){

        $input = $request->input('tukar');
        $replacedInput = str_replace(['.', '/'], ['_', '-'], $input);
        return $replacedInput;
    }
}
