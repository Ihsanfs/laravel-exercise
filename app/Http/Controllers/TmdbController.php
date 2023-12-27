<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TmdbController extends Controller
{
    public function index(){
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=a928b09806e73f7247f4075db560b7d0');

        if ($response->successful()) {
            $movieData = $response->json()['results'];
            return view('tmdb.index', compact('movieData'));
        } else {
            return response()->json(['error' => 'Failed to fetch movie data'], $response->status()); // Handle the error
        }
    }

    public function search(Request $request){
        $searchdata = rawurlencode($request->carifilm);
        // $searchdata = urlencode($request->carifilm);

        $response = Http::get("https://api.themoviedb.org/3/search/movie?query={$searchdata}&api_key=a928b09806e73f7247f4075db560b7d0");

        if ($response->successful()) {
            $movieData = $response->json()['results'];
            return view('tmdb.index', compact('movieData'));

        } else {
            // Handle the error or return an appropriate response
            return response()->json(['error' => 'Failed to fetch movie data'], $response->status());
        }

    }
}
