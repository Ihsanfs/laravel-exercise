<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class OmdbController extends Controller
{
    public function getData(Request $request )
    {
        // $client = new Client();
        // $response = $client->get('http://www.omdbapi.com/', [
        //     'query' => [
        //         'apikey' => config('omdb.api_key'),
        //         's' => $title

        //     ]
        // ]);
        // $data = json_decode($response->getBody());


        // $res = Http::get('https://data.covid19.go.id/public/api/prov_time.json');



        // dd($res);
        // return view('omdb.data', ['data' => $data]);
    }

    // $client = new Client();
    //     $response = $client->get('http://www.omdbapi.com/', [
    //         'query' => [
    //             'apikey' => config('omdb.api_key'),
    //             's' => $title
    //         ]
    //     ]);
    //     $data = json_decode($response->getBody());
    //     return view('omdb.data', ['data' => $data]);
  public function search(Request $request, $page = 1)
{
    $request->validate([
        'query' => 'required|min:3'
    ]);

    $query = $request->input('query');
    $client = new Client();
    $response = $client->get('http://www.omdbapi.com', [
        'query' => [
            'apikey' => config('omdb.api_key'),
            's' => $query,
            'page' => $page
        ]
    ]);
    $data = json_decode($response->getBody());
    return $data;
;    // dd($data);
    // return view('omdb.search', ['data' => $data]);
}


}
