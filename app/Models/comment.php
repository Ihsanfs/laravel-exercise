<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table ='comments';
    // protected $primary_key = 'id';
    protected $fillable = [
        'student_id',
        'comment',
        'slug'

    ];

    public function student()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key');
        return $this->belongsTo(student::class);
    }


     public function getRouteKeyName()
    {
        return 'slug';
    }


}
