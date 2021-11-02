@extends('master')

@section('content')

    <div id="main">
        @if(session()->has('success'))
            <div>
                <p class="text-success"> {{ session()->get('success') }}</p>
            </div>
        @endif
    </div>
    <h1>List of Iphones</h1>
    <div class="container-fluid p-0">
        <div class="row">
        @foreach($iphones1 as $iphone)
            @if($iphone->is_active === 1)
                <div class="col-12 col-md-4 col-lg-3">
                    <a href="{{ route('admin.show', ['iphone' => $iphone->id]) }}" class="tabs mt-3">
                        <img class="rowimg" style="" src="{{ asset('storage/images/'.$iphone->images()->first()->file_path ) }}" alt="">
                        <div class="undertext">
                            <p><strong>Name</strong> {{$iphone->name}}
                            <p><strong>Name</strong> {{$iphone->images[0]->file_path}}</p>
                            <p><strong>Price</strong> {{$iphone->price}}</p>
                            <p class="text-success">Click to read more :)</p>
                        </div>
                    </a>
                </div>
             @endif
            @endforeach
        </div>
    </div>
@endsection
