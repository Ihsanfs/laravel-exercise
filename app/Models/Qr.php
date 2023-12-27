<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $primarykey = 'id';
    protected $guarded = [];
    protected $fillable = ["name", "price", "qr"];
    public $timestamps = false;

}
