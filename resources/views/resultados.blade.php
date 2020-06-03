@extends('layout')

@section('title', 'results')
    
@section('content')
    <h1>Prueba de roles</h1>   
    

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">POSTS</th>
            <th scope="col">ROLES</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>
                @foreach ($user->posts as $post)
                    <li>{{ $post->title_post }}</li>
                @endforeach
            </td>

            <td>
                @foreach ($user->roles as $role)
                    <li>{{ $role->name_role }}</li>
                @endforeach
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection