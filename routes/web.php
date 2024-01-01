<?php

use App\Http\Controllers\AjaxController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\ImdbController;
use App\Http\Controllers\loadpageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OmdbController;
use App\Http\Controllers\PerulanganController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SlugController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TanggalController;
use App\Http\Controllers\TerbilangController;
use App\Http\Controllers\TmdbController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tmdb', [TmdbController::class, 'index']);
Route::get('/tmdb/search', [TmdbController::class, 'search'])->name('carifilm');



Route::resource('film', MovieController::class);
// Route::resource('film', PhotoController::class);
Route::get('/film', [MovieController::class, 'index'])->name('movies.index');
Route::get('/film/{$id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/film/search', [MovieController::class, 'search'])->name('movies.search');
Route::post('/film/simpan', [MovieController::class, 'tambah'])->name('movies.tambah');

// Route::get('/film', [MovieController::class, 'search']);

// /qrcode
Route::get('qrcode/{id}', [QrcodeController::class, 'generate'])->name('generate');
Route::get('qrcode', [QrcodeController::class, 'index'])->name('qr.index');
Route::post('qrcode/simpan', [QrcodeController::class, 'store'])->name('qr.store');



Route::get('/terbilang', [TerbilangController::class, 'index'])->name('terbilang');
Route::post('/terbilang', [TerbilangController::class, 'terbilang']);

Route::get('/movie', [OmdbController::class, 'getData']);
Route::get('/artikel/{kategori}', [FrontController::class, 'artikel_kategori']);
Route::get('/cek', [FrontController::class, 'cek']);
//ajax
Route::get('/ajax', [AjaxController::class, 'tampildata']);
Route::get('/ajax/{id}', [AjaxController::class, 'fetchdata'])->name('users.show');
Route::get('/ajax/data/cek', [AjaxController::class, 'cekdata']);


Route::get('/ajax/data', [AjaxController::class, 'testing']);
Route::get('/ajax/testing', [AjaxController::class, 'getdata'])->name('testing');
Route::get('/ajax/wa', [AjaxController::class, 'wa']);

Route::get('/perulangan', [PerulanganController::class, 'index']);

Route::post('/perulangan/input', [PerulanganController::class, 'store'])->name('perulangan');


Route::get('/movie/{title}', [OmdbController::class, 'getData']);
Route::get('/movie/search/{query}/{page}', [OmdbController::class, 'search']);

Route::get('/movie/search', [OmdbController::class, 'search']);
Route::get('/movie/search', function () {
    return view('omdb.search');
});
// Route::get('/movie/{title}', [MovieController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('photo', [PhotoController::class, 'index']);
Route::get('photo', [PhotoController::class, 'create']);
Route::post('photo', [PhotoController::class, 'store']);
Route::get('photos', [StudioController::class, 'create'])->name('photo');
// Route::get('photos', [StudioController::class, 'cek'])->name('student.cek');
Route::get('slug', [SlugController::class, 'index']);

Route::post('photos', [StudioController::class, 'store']);
Route::resource('photos', StudioController::class);

Route::resource('photo', PhotoController::class);
// Route::post('photo', 'store')->name('register');
Route::get('/students/store/comment', [StudentController::class,'store_comment'])->name('storeComment');
Route::get('/students/{s}', [StudentController::class,'index'])->name('student.slug');
Route::get( '/imdb', [ImdbController::class,'index']);

//group
Route::get('group', [GroupsController::class, 'index'])->name('group');
Route::post('groups', [GroupsController::class, 'searchByYear'])->name('groupsearch');

//quiz
// Tampilan pertanyaan quiz
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

// Menyimpan jawaban dari pengguna
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

// Menampilkan skor quiz
Route::get('/quiz/result/{score}', [QuizController::class, 'result'])->name('quiz.result');

// Tampilan formulir tambah pertanyaan
Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');

// Menyimpan pertanyaan baru
Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');

Route::get('tanggal_auto', [TanggalController::class, 'index']);
