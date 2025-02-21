<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    /** @use HasFactory<\Database\Factories\ArtistaFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'edad', 'nacionalidad', 'foto'];

    public function canciones()
    {
        return $this->belongsToMany(Cancion::class);
    }
}
