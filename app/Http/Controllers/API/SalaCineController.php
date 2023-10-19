<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalaCineRequest;
use App\Http\Resources\SalaCineResource;
use App\Services\SalaCineService;

class SalaCineController extends Controller
{
    protected $salaCineService;

    public function __construct(SalaCineService $salaCineService)
    {
        $this->salaCineService = $salaCineService;
    }

    public function index()
    {
        $salasCine = $this->salaCineService->getAllSalasCine();
        return SalaCineResource::collection($salasCine);
    }

    public function show($id)
    {
        $salaCine = $this->salaCineService->getSalaCineById($id);
        return new SalaCineResource($salaCine);
    }

    public function store(SalaCineRequest $request)
    {
        $data = $request->validated();
        $salaCine = $this->salaCineService->createSalaCine($data);
        return new SalaCineResource($salaCine);
    }

    public function update(SalaCineRequest $request, $id)
    {
        $data = $request->validated();
        $salaCine = $this->salaCineService->updateSalaCine($id, $data);
        return new SalaCineResource($salaCine);
    }

    public function destroy($id)
    {
        $this->salaCineService->deleteSalaCine($id);
        return response()->json(['message' => 'Sala de cine eliminada con éxito']);
    }

    public function searchAndCheckCapacity(SalaCineRequest $request)
    {
        $nombreSalaCine = $request->input('nombre_sala_cine');

        $salaCine = $this->salaCineService->searchSalaCineByName($nombreSalaCine);

        if (!$salaCine) {
            return response()->json(['message' => 'Sala de cine no encontrada'], 404);
        }

        $peliculasCount = $salaCine->peliculas->count();

        $message = '';

        if ($peliculasCount < 3) {
            $message = 'Sala casi Vacía';
        } elseif ($peliculasCount >= 3 && $peliculasCount <= 5) {
            $message = 'Sala casi Llena';
        } else {
            $message = 'Sala Llena';
        }

        return response()->json(['message' => $message]);
    }

}
