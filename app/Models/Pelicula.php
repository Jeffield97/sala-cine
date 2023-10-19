<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'duracion'];

    public function salasCine()
    {
        return $this->belongsToMany(SalaCine::class, 'pelicula_sala', 'pelicula_id', 'sala_cine_id')
            ->withPivot('fecha_publicacion', 'fecha_fin');
    }
}
