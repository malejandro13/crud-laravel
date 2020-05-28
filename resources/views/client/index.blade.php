@extends('layout')

@section('title', 'Clients page')

@section('content')
    <h1>view Client - Method index</h1>

    @include('partials.alert')
    
    <a href="{{ route('clients.create') }}" class="btn btn-success">Crear</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
          <tr>
            <th scope="row">{{ $client->id }}</th>
            <td>{{ $client->email }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->birthday }}</td>
            <td><a href="{{ route('clients.show', $client) }}" class="btn btn-primary">Ver</a></td>
            <td><a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Editar</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $clients->links() }}
@endsection