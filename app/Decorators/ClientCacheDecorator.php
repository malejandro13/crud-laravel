<?php

namespace App\Decorators;

use App\Interfaces\ClientInterface;
use Illuminate\Support\Facades\Cache;
use App\Repositories\ClientRepository;

class ClientCacheDecorator implements ClientInterface
{
    protected $client;

    public function __construct(ClientRepository $client)
    {
        $this->client = $client;
    }
    
    public function getPaginated()
    {
        $key = "clients.page.". request('page', 1);

        return Cache::tags('clients')->rememberForever($key, function() {
            return $this->client->getPaginated();
        });
    }

    public function store($fields)
    {
        Cache::tags('clients')->flush();
        return $this->client->store($fields);
    }

    public function findById($id)
    {
        return Cache::tags('clients')->rememberForever("client.{$id}", function() use($id) {
            return $this->client->findById($id);
        });
    }

    public function update($fields, $id)
    {
        Cache::tags('clients')->flush();
        return $this->client->update($fields, $id);
    }

    public function destroy($id)
    {
        Cache::tags('clients')->flush();
        return $this->client->destroy($id);
    }
}