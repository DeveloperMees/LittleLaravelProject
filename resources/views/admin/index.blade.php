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
            <a class="nav-link active" aria-current="page" href="/admin/index">Index</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/create">Create</a>
        </li>
    </ul>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($iphones as $iphone)
        <tr>
            <th scope="row">{{$iphone->id}}</th>
            <td>{{$iphone->name}}</td>
            <td>{{$iphone->price}}</td>
            <td>{{$iphone->message}}</td>
            <td><img style="max-height: 60px; max-width: 60px" src="{{ asset('storage/images/'.$iphone->file_path) }}" alt=""></td>
            <td><a href="{{route('admin.edit', ['iphone' => $iphone->id])}}">Edit</a></td>
            <td><a href="{{route('admin.delete', ['iphone' => $iphone->id])}}">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
