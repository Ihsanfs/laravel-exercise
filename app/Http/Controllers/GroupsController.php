<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GroupsController extends Controller
{
    // public function index(){
    //     // $users = User::select(DB::raw('YEAR(created_at) as year'), 'name', DB::raw('COUNT(*) as total'))
    //     // ->groupBy('year', 'name')
    //     // ->orderBy('year', 'asc')
    //     // ->get();
    //     $users = User::selectRaw('YEAR(created_at) as year, name')
    //     ->groupBy('year', 'name')
    //     ->orderBy('year', 'asc')
    //     ->get();


    //     // dd($users);
    //     return view('group',compact('users'));

    //     // $searchYear = 2026; // Tahun yang ingin dicari

    //     // $users = User::selectRaw('YEAR(created_at) as year, name')
    //     //             ->whereYear('created_at', $searchYear)
    //     //             ->groupBy('year', 'name')
    //     //             ->orderBy('year', 'asc')
    //     //             ->get();

    //     // dd($users);
    // }
    // public function searchByYear(Request $request)
    // {
    //     $year = $request->input('year');

    //     // Lakukan query berdasarkan tahun yang dipilih
    //     $users = User::selectRaw('YEAR(created_at) as year, name')
    //                 ->whereYear('created_at', $year)
    //                 ->groupBy('year', 'name')
    //                 ->orderBy('year', 'asc')
    //                 ->get();

    //     // Mengembalikan view yang menampilkan hasil pencarian
    //     return view('group')->with('users', $users);
    // }
    public function index()
    {
        $users = User::selectRaw('YEAR(created_at) as year, name')
            ->groupBy('year', 'name')
            ->orderBy('year', 'asc')
            ->get();

        $years = $users->pluck('year')->unique();

        return view('group', compact('users', 'years'));
    }

    public function searchByYear(Request $request)
    {
        $year = $request->input('year');

        $users = User::selectRaw('YEAR(created_at) as year, name')
            ->whereYear('created_at', $year)
            ->distinct()
            ->groupBy('year', 'name')
            ->orderBy('year', 'asc')
            ->get();

        return response()->json($users);
    }


}
