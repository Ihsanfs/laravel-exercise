<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    // public function index(){
    //     $student = Student::find(1);
    //     dd($student->comment);
    // }

    // public function index($comment){
    //     $student = Student::has('comment','>=',$comment)->get();
    //     // return view('has',compact('student'));
    //     dd($student);
    // }

public function index (Request $request, student $s){

    // $student=Student::where('slug')->first();
    // $student = $comment->comment('comment')->get();
    // $student->get($slug);

    $data = $s->comment()->get();
    // dd($data);
    return view('has',compact('data'));
    // dd($data);
}

    // relasi get data berdasarkan id
    // public function index($slug){
    //     $student = Student::where('slug',$slug)->with(['comment' => function($query) {
    //         $query->orderBy('comment','desc');
    //     }])->get();
    //     // return response()->json($student);
    //     return view('has',['student'=>$student,'slug'=>$slug]);
        // dd($student);
    // }

    // relation mencari kata
//     public function index (){
//         $student = Student::whereHas('comment',function($query){
//             $query->where('comment','like','%anjas%');
//         })->get();
// dd($student);
//     }
    // menghitung jumlah komen antarrelasi
//     public function index (){
//         $student = Student::withCount('comment')->get();
// dd($student);
//     }

// public function index ($comment){
//     $student = Student::withCount(['comment' => function($query) {
//         $query->where('comment','like','%a%');
//     }])->get();
// dd($student);
// }
    // public function index(){
    //     $student = Student::doesntHave('comment')->get();
    //     dd($student);
    // }
    public function store_comment(){

        $student = student::find(1);

        $comment = new comment();
        $comment->student_id = $student->id;
        $comment->comment = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust';
        $comment->save();

        $comment = new Comment;
        $comment->student_id = $student->id;
        $comment->comment = 'king it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydne';
        $comment->save();

        $comment = new Comment;
        $comment->student_id = $student->id;
        $comment->comment = 'ed to be sure there isnt anything embarrassing hidden in the middle of text. All the Latin words,';
        $comment->save();

        dd($comment);
    }
}
