<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function index(){
        $student = student::all();

        return view('slug-test',compact('student'));

    }
}
