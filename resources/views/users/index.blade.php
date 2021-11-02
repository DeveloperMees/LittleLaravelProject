@extends('master')

@section('content')
    @if(session()->has('success'))
        <div class="needsmargin">
            <p class="text-success"> {{ session()->get('success') }}</p>
        </div>
    @endif
    @if(auth()->user())
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/users/index">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Create</a>
            </li>
        </ul>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <th scope="row">{{$user->name}}</th>
                <th scope="row">{{$user->email}}</th>
                <td><a href="{{route('users.edit', ['user' => $user->id])}}">Edit</a></td>
                <td><a href="{{route('users.delete', ['user' => $user->id])}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
