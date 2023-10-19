<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository
{
    public function getAllClientes()
    {
        return Cliente::all();
    }

    public function createCliente($data)
    {
        return Cliente::create($data);
    }

    public function getClienteById($id)
    {
        return Cliente::findOrFail($id);
    }

    public function updateCliente($id, $data)
    {
        $cliente = $this->getClienteById($id);
        $cliente->update($data);
        return $cliente;
    }

    public function deleteCliente($id)
    {
        $cliente = $this->getClienteById($id);
        $cliente->delete();
    }
}
