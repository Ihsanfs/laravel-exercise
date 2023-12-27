<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

class AjaxController extends Controller
{
    public function index(){

        $date = date('l, j F Y');
        return view('ajax.index', compact('date'));

    }

    public function fetchdata($id){
        $users = User::find($id);

        return response()->json($users);
    }

    public function tampildata(){
        $users = User::paginate(4);
        return view('jqueryajax', compact('users'));
    }


    public function cekdata(){
        $users =User::select('name', 'email')->get();

       return response()->json($users);;
    }


    public function cek(Request $request){
        $name = $request->input('name');

        // Lakukan logika atau akses ke basis data sesuai kebutuhan Anda

        $data = [
            'firstName' => 'John',
            'lastName' => 'Doe',
        ];

        return response()->json($data);
    }

    public function getdata(){

        $artikel = artikel::where('categoris_id', '3')->get();
        if($artikel->isEmpty()){
            return '<h1 style="text-align : center;"> Data Not Found</h1>';

        }else{
            return response()->json($artikel);

        }
    }

    public function testing(){
        return view('getdata.index');
    }


    public function wa(){





        $client = new \GuzzleHttp\Client();

        $k = 5;

        for ($i = 0; $i < $k; $i++) {
            $response = $client->request('POST', 'https://waapi.app/api/v1/instances/3139/client/action/send-message', [
                'body' => '{"chatId":"6282167575512@c.us","message":"hello my friend"}',
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer 7nZFaZatHwItXSdWbwKn1mZhaIUKyVkr2q3Bub4i',
                    'content-type' => 'application/json',
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['data']['instanceId'])) {
                $instanceId = $data['data']['instanceId'];
                echo "Instance ID for request $i: $instanceId\n";
            } else {
                echo "Instance ID not found in the response for request $i.\n";
            }
        }




    }
}
