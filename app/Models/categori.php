<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class categori extends Model
{
    use HasFactory;
    protected $table = 'categoris';
    protected $fillable = ['nama_kategori','slug'];
    protected $hidden = ['id'];



    public function artikel()
    {
        return $this->hasMany(artikel::class);
    }
}
