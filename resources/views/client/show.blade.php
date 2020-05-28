@extends('layout')

@section('title', $client->name)

@section('content')
    <h1>Client</h1>

    <ul>
        <li>{{ $client->id }}</li>
        <li>{{ $client->email }}</li>
        <li>{{ $client->name }}</li>
        <li>{{ $client->birthday }}</li>
    </ul>
@endsection