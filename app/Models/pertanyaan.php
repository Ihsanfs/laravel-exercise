<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    use HasFactory;

    protected $table ='questions';
    protected $guarded = [];


    public function answers()
    {
        return $this->hasMany(jawaban::class, 'question_id');
    }
}
