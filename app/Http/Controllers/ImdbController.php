<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImdbController extends Controller
{
    public function index()
    {


        $apiKey = 'k_s0nrvnwb';
        $response = Http::get("https://imdb-api.com/en/API/ComingSoon/{$apiKey}");

        $movies = collect($response->json()['items']); // Convert the movie items to a Laravel collection

        // $perPage = 10; // Number of movies per page
        // $page = request()->input('page', 1); // Get the current page from the request, default to 1 if not provided

        $perPage = 10; // Number of movies per page
        $page = request()->input('page', 1); // Get the current page from the request, default to 1 if not provided
        $paginatedMovies = new LengthAwarePaginator(
            $movies->forPage($page, $perPage),
            $movies->count(),
            $perPage,
            $page
        );
        $paginatedMovies->setPath(request()->url());

        // Set the path for the pagination links
        // $paginatedMovies = new LengthAwarePaginator(
        //     $movies->forPage($page, $perPage),
        //     $movies->count(),
        //     $perPage,
        //     $page,
        //     [
        //         'path' => request()->url(),
        //         'query' => request()->query(),
        //     ]
        // );


        return view('movieimdb.index', compact('paginatedMovies'));
    }
}
 // $response = get('https://imdb-api.com/en/API/Top250Movies/k_s0nrvnwb');
        // $response = $client->request('GET', '');

        // $response = Http::get('https://api.kawalcorona.com/indonesia')->status();

        // dd($response);

        // return response()->json($response);
        // // return $response;
        // $response = Http::get('https://imdb-api.com/en/API/SearchMovie/k_s0nrvnwb/', [
        //     'id' => 'Taylor',
        //     'page' => 1,
        // ]);

        // $response = Http::acceptJson()->get('https://imdb-api.com/en/API/SearchMovie/k_s0nrvnwb/avengers');
    //   $response =   Http::withHeaders([
    //         'key' => 'k_s0nrvnwb',
    //     ])->get('https://imdb-api.com/en/API/SearchMovie/k_s0nrvnwb/avengers');

    //     $status = $response->json()['title'];
    //    dd($status);
