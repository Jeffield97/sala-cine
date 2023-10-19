<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeliculaRequest;
use App\Http\Resources\PeliculaResource;
use App\Services\PeliculaService;

class PeliculaController extends Controller
{
    protected $peliculaService;

    public function __construct(PeliculaService $peliculaService)
    {
        $this->peliculaService = $peliculaService;
    }

    public function index()
    {
        $peliculas = $this->peliculaService->getAllPeliculas();
        return PeliculaResource::collection($peliculas);
    }

    public function show($id)
    {
        $pelicula = $this->peliculaService->getPeliculaById($id);
        return new PeliculaResource($pelicula);
    }

    public function store(PeliculaRequest $request)
    {
        $data = $request->validated();
        $pelicula = $this->peliculaService->createPelicula($data);
        return new PeliculaResource($pelicula);
    }

    public function update(PeliculaRequest $request, $id)
    {
        $data = $request->validated();
        $pelicula = $this->peliculaService->updatePelicula($id, $data);
        return new PeliculaResource($pelicula);
    }

    public function destroy($id)
    {
        $this->peliculaService->deletePelicula($id);
        return response()->json(['message' => 'Película eliminada con éxito']);
    }

    public function search(PeliculaRequest $request)
    {
        $nombrePelicula = $request->input('nombre_pelicula');
        $idSalaCine = $request->input('id_sala_cine');

        $pelicula = $this->peliculaService->searchPelicula($nombrePelicula, $idSalaCine);

        if (!$pelicula) {
            return response()->json(['message' => 'Película no encontrada'], 404);
        }

        return new PeliculaResource($pelicula);
    }

    public function countByPublicationDate(PeliculaRequest $request)
    {
        $fechaPublicacion = $request->input('fecha_publicacion');
        $publicadasAntes = $request->input('publicadas_antes');

        $count = $this->peliculaService->countByPublicationDate($fechaPublicacion, $publicadasAntes);

        return response()->json(['count' => $count]);
    }

}
