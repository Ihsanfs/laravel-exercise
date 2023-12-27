<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Qr;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    public function index(){

        $data =Qr::all();
        return view('Qrcode.qr', compact('data'));

    }

    public function show(){

    }
    public function generate ($id)
    {
        $data = Qr::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($data->name);
        // return response()->json($qrcode);


        return $qrcode;

    }


    public function store(Request $request){
        // $data = Qr::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'qr' => QrCode::size(100)->generate($request->name ),
        // ]);
            $data = new Qr;
            $data->name = $request->name;
            $data->price = $request->price;
            $data->qr = QrCode::size(100)->generate($request->name );
            $data->save();
        return back();

    }
}
