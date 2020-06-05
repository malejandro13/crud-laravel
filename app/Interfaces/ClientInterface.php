<?php

namespace App\Interfaces;

interface ClientInterface
{
    public function getPaginated();

    public function store($fields);

    public function findById($id);

    public function update($fields, $id);

    public function destroy($id);
}