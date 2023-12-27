<?php

namespace App\Models;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Photo extends Model
{
    use HasFactory;
    #kalau pendefenisian tidak bahasa inggris harus mendeklarsikan tabel di bawah ini
    protected $table = 'photos';
    #batas

    //setelah itu baru di defenisikan
    protected $fillable = ['nama, alamat, jenis,kode_id,created_at'];
    protected $guards = [];



    public function alldata(){

        $photo = DB::table('photos')
            ->leftJoin('studio', 'studio.id', '=', 'photo.id')
            ->get();


    }

}
