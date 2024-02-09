<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
  public function index(){
    return view('cuaca.index');

  }

  public function cuacaget(Request $request){
    $key = '666c714bee7144fb949162329240701';

    $provinsi = $request->lokasi ?? "jakarta";

    $url = "http://api.weatherapi.com/v1/forecast.json?key={$key}&q={$provinsi}&days=1&aqi=yes&alerts=yes";


    $response = Http::get($url);

    if ($response->successful()) {
        $data = $response->json();
    return response()->json($data);
    // return response()->json(['location' => ['name' => $data['location']['name']]]);

    } else {
        return response("Gagal mengambil data cuaca.", 500);
    }


  }

}
