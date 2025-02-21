<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    /** @use HasFactory<\Database\Factories\AlbumFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'albumes';

    protected $fillable = [
        'nombre',
        'imagen',
    ];

    public function canciones()
    {
        return $this->belongsToMany(Cancion::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
