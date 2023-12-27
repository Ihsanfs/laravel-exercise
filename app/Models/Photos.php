<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;
    protected $table = 'studio';
    #batas

    //setelah itu baru di defenisikan
    // protected $fillable = ['nama, alamat, jenis,kode_id,created_at'];
    protected $fillable = ['nama, alamat, jenis,kode_id,created_at'];
    protected $guards = [];



    public function alldata(){

        $photo = DB::table('photos')
            ->leftJoin('studio', 'studio.id', '=', 'photo.id')
            ->get();

    }
}

