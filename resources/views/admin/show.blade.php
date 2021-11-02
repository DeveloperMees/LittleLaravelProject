@extends('master')

@section('content')
    @if(session()->has('success'))
        <div class="needsmargin">
            <p class="text-success"> {{ session()->get('success') }}</p>
        </div>
    @endif

    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-7">
                    <div class="left">
                        <a href="https://via.placeholder.com/300.png/09f/fff
C/O https://placeholder.com/" class="luminous gallery__item gallery__item--1">
                            <img class="rowimg" style="" src="{{ asset('storage/images/'.$iphone->images()->first()->file_path ) }}" alt=""></a>
                        <a href="https://via.placeholder.com/300.png/09f/fff"></a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-5">
                    <div class="right">
                        <h1 class="mb-3">Iphone Specs</h1>
                        <p><strong>Name: </strong>{{ $iphone->name }}</p>
                        <p><strong>Price: </strong>{{ $iphone->price }}</p>
                        <p><strong>Message: </strong>{{ $iphone->message }}</p>
                        <h2 class="mt-5">Questions?</h2>
                        <form method="get" action="/send-email" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name?">
                            </div>
                            <div class="">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email?">
                            </div>
                            <br>
                            <label for="message">Message</label>
                            <div class="input-group">
                        <textarea class="form-control" name="message" id="message"
                                  placeholder="Place here your message"></textarea>
                            </div>
                            <br>
                            <button name="start" id="start" type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
