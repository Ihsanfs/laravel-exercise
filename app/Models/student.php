<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['name','kelas','slug'];

    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    // untuk menggunakan has many dimana setiap tag mempunyai banyak postingan dan jangan lupa menambahkan defenisi dibawah ini
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
