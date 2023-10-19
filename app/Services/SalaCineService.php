<?php

namespace App\Services;

use App\Models\SalaCine;

class SalaCineService
{
    public function getAllSalasCine()
    {
        return SalaCine::all();
    }

    public function getSalaCineById($id)
    {
        return SalaCine::findOrFail($id);
    }

    public function createSalaCine($data)
    {
        return SalaCine::create($data);
    }

    public function updateSalaCine($id, $data)
    {
        $salaCine = SalaCine::findOrFail($id);
        $salaCine->update($data);
        return $salaCine;
    }

    public function deleteSalaCine($id)
    {
        $salaCine = SalaCine::findOrFail($id);
        $salaCine->delete();
    }

    public function searchSalaCineByName($nombreSalaCine)
    {
        return SalaCine::where('nombre', $nombreSalaCine)->first();
    }
}
