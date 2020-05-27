@extends('layout')

@section('title', 'Create Client Page')

@section('content')
    <h1>Crear Nuevo Cliente</h1>
    <div class="card shadow p-3" style="max-width: 500px">
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="email_confirmation">Email address confirmation</label>
          <input type="email" class="form-control @error('email_confirmation') is-invalid @enderror" id="email_confirmation" name="email_confirmation" value="{{ old('email_confirmation') }}">
          @error('email_confirmation')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
            @error('birthday')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@endsection