@extends('master')

@section('content')
    <main class="w-50 mx-auto">
        <h1 class="text-center font-bold text-xl pt-3">Register a user</h1>
        <ul class="nav nav-tabs mt-5">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/users/index">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/register">Create</a>
            </li>
        </ul>
        <form method="POST" action="/register" class="mt-5">
            @csrf

            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="name"
                >
                    Name
                </label>

                <input class="form-control"
                       type="text"
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
                       for="email"
                >
                    Email
                </label>

                <input class="form-control"
                       type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required
                >

                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="password"
                >
                    Password
                </label>

                <input class="form-control"
                       type="password"
                       name="password"
                       id="password"
                       required
                >

                @error('password')
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



