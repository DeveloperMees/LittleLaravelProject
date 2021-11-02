@extends('master')

@section('content')
    <main class="w-50 mx-auto">
        <h1 class="text-center font-bold text-xl pt-3">Make an iphone!</h1>
        <ul class="nav nav-tabs mt-5">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/index">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/create">Create</a>
            </li>
        </ul>
        <form method="POST" enctype="multipart/form-data" action="/admin/store" class="mt-0">
            @csrf

            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="name"
                >
                    name
                </label>

                <input class="form-control"
                       type="name"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       required
                >

                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="price"
                >
                    price
                </label>

                <input class="form-control"
                       type="price"
                       name="price"
                       id="price"
                       value="{{ old('price') }}"
                       required
                >

                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Upload a image</label>
                <input type="file" name="file_path" class="form-control-file" id="image" multiple>
            </div>
            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="message"
                >
                    message
                </label>

                <input class="form-control"
                       type="message"
                       name="message"
                       id="message"
                       value="{{ old('message') }}"
                       required
                >

                @error('message')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit"
                        class="bg-blue-400  rounded py-2 px-4"
                >
                    Submit
                </button>
            </div>
        </form>
    </main>
@endsection



