@extends('layout')

@section('title', 'Create Client Page')

@section('content')
    <h1>Crear Nuevo Cliente</h1>
    <div class="card shadow p-3" style="max-width: 500px">
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@endsection