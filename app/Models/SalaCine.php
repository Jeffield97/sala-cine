<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaCine extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'estado'];

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class, 'pelicula_sala', 'sala_cine_id', 'pelicula_id')
            ->withPivot('fecha_publicacion', 'fecha_fin');
    }
}
