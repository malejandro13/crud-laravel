@extends('layout')

@section('title', 'Editar Cliente')

@section('content')
    <h1>Editar Cliente</h1>
    <div class="card shadow p-3" style="max-width: 500px">
    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf @method('PATCH')
        <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $client->email) }}">
        @error('email')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
        </div>

        <div class="form-group">
        <label for="email_confirmation">Email address confirmation</label>
        <input type="email" class="form-control @error('email_confirmation') is-invalid @enderror" id="email_confirmation" name="email_confirmation" value="{{ old('email_confirmation', $client->email) }}">
        @error('email_confirmation')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $client->name) }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday', $client->birthday) }}">
            @error('birthday')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
@endsection