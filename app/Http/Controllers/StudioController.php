<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photos;
use App\Models\student;

class StudioController extends Controller
{

    public function index(){




    }


    public function create(){
        return view('create');
    }

   public function store(Request $request){

    Photos::insert([
        'studio_kelas' => $request->studio_kelas,
                        'nomor' => $request->nomor,

                        'created_at' => now(),
                        //  'updated_at' => now(),
                        ]);

        return redirect('photo');
   }
}
