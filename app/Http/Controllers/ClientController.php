<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Interfaces\ClientInterface;
use Illuminate\Support\Facades\Cache;


class ClientController extends Controller
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index', [
            'clients' => $this->client->getPaginated(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email|max:50|confirmed|unique:clients',
            'name' => 'required|string|max:50',
            'birthday' => 'required|date|before:tomorrow',
        ]);

        $this->client->store($fields);

        return redirect()->route('clients.index')->with('status', 'Su registro fue realizado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('client.show', [
            'client' => $this->client->findById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('client.edit', [
            'client' => $this->client->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'email' => 'required|email|max:50|confirmed|unique:clients,email,'.$id,
            'name' => 'required|string|max:50',
            'birthday' => 'required|date|before:tomorrow',
        ]);

        $this->client->update($fields, $id);    

        return redirect()->route('clients.index')->with('status', 'Su registro fue actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->client->destroy($id);

        return redirect()->route('clients.index')->with('status', 'Su registro fue eliminado satisfactoriamente');
    }
}
