<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;
    protected $table ='answers';
    protected $guarded = [];
    public function question()
    {
        return $this->belongsTo(pertanyaan::class);
    }
}
