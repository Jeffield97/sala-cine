<?php

namespace App\Services;

use App\Models\Pelicula;

class PeliculaService
{
    public function getAllPeliculas()
    {
        return Pelicula::all();
    }

    public function getPeliculaById($id)
    {
        return Pelicula::findOrFail($id);
    }

    public function createPelicula($data)
    {
        return Pelicula::create($data);
    }

    public function updatePelicula($id, $data)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($data);
        return $pelicula;
    }

    public function deletePelicula($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();
    }
    public function searchPelicula($nombrePelicula, $idSalaCine)
    {
        return Pelicula::where('nombre', $nombrePelicula)
            ->whereHas('salasCine', function ($query) use ($idSalaCine) {
                $query->where('id', $idSalaCine);
            })
            ->first();
    }

    public function countByPublicationDate($fechaPublicacion, $publicadasAntes)
    {
        $query = Pelicula::query();

        if ($publicadasAntes) {
            $query->whereDate('fecha_publicacion', '<', $fechaPublicacion);
        } else {
            $query->whereDate('fecha_publicacion', '>=', $fechaPublicacion);
        }

        return $query->count();
    }

}
