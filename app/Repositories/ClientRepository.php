<?php

namespace App\Repositories;

use App\Client;
use App\Interfaces\ClientInterface;

class ClientRepository implements ClientInterface
{
    public function getPaginated()
    {
        return Client::orderBy('id', 'desc')->simplePaginate(10);
    }

    public function store($fields)
    {
        return Client::create($fields);
    }

    public function findById($id)
    {
        return Client::findOrFail($id);  
    }

    public function update($fields, $id)
    {
        return Client::findOrFail($id)->update($fields);
    }

    public function destroy($id)
    {
        return Client::findOrFail($id)->delete();
    }
}