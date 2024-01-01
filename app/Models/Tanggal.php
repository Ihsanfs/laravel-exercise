<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggal extends Model
{
    use HasFactory;

    protected $table = "tanggal_auto";

    protected $fillable = ['nama', 'tanggal','kode'];
    protected $guarded = ['tanggal','kode'];
}
