<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    protected $fillable = ['id','judul','body','gambar','categoris_id'];
    protected $hidden = ['id'];
    /**
     * Get the user that owns the artikel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoris()
    {
        return $this->belongsTo(categoris::class);
    }

    public function getRouteKeyName()
    {
        return 'judul';
    }
}
