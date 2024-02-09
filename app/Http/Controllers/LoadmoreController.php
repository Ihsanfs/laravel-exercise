<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoadmoreController extends Controller
{
    public function index(Request $request)
    {
    $posts = User::paginate(10);

    return view('load_more.index', compact('posts'));
    }

    public function loadMoreData(Request $request)
    {
        $start = $request->input('start');

        $data = user::orderBy('id', 'ASC')
            ->offset($start)
            ->limit(10)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + $data->count()
        ]);
    }
}
