<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $key = "clients.page.". request('page', 1); //clients.page.4

        /*if(Cache::has($key)){
            $clients = Cache::get($key);
        } else {
            $clients = Client::orderBy('id', 'desc')->simplePaginate(10);
            Cache::put($key, $clients, 60);
        }*/

        $clients = Cache::tags('clients')->rememberForever($key, function() {
            return Client::orderBy('id', 'desc')->simplePaginate(10);
        });




        return view('client.index', [
            'clients' => $clients,
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

        Client::create($fields);

        Cache::tags('clients')->flush();

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

        $client = Cache::tags('clients')->rememberForever("client.{$id}", function() use($id) {
            return Client::findOrFail($id);
        });

        
        return view('client.show', [
            'client' => $client
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
        $client = Cache::tags('clients')->rememberForever("client.{$id}", function() use($id) {
            return Client::findOrFail($id);
        });

        return view('client.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $fields = $request->validate([
            'email' => 'required|email|max:50|confirmed|unique:clients,email,'.$client->id,
            'name' => 'required|string|max:50',
            'birthday' => 'required|date|before:tomorrow',
        ]);

        $client->fill($fields);

        if($client->isClean()) {
            return redirect()->route('clients.index')->with('status', 'Su registro no fue necesario actualizarlo');
        }

        $client->save();

        Cache::tags('clients')->flush();

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
        $client = Cache::rememberForever("client.{$id}", function() use($id) {
            return Client::findOrFail($id);
        });
        
        $client->delete();

        Cache::tags('clients')->flush();
        
        return redirect()->route('clients.index')->with('status', 'Su registro fue eliminado satisfactoriamente');
    }
}
