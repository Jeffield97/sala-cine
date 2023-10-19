<?php

namespace App\Services;

use App\Repositories\ClienteRepository;

class ClienteService
{
    protected $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getAllClientes()
    {
        return $this->clienteRepository->getAllClientes();
    }

    public function createCliente($data)
    {
        return $this->clienteRepository->createCliente($data);
    }

    public function getClienteById($id)
    {
        return $this->clienteRepository->getClienteById($id);
    }

    public function updateCliente($id, $data)
    {
        return $this->clienteRepository->updateCliente($id, $data);
    }

    public function deleteCliente($id)
    {
        $this->clienteRepository->deleteCliente($id);
    }
}
