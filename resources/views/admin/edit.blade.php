@extends('master')

@section('content')
    <main class="w-50 mx-auto">
        <h1 class="text-center font-bold text-xl pt-3">Edit an iphone!</h1>
        <ul class="nav nav-tabs mt-5">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/index">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/admin/create">Create</a>
            </li>
        </ul>
        <form method="GET" action="{{ route('admin.update', $iphone->id) }}" class="mt-0">
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
                       value="{{$iphone->name}}"
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
                       value="{{$iphone->price}}"
                       required
                >

                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
{{--            <div class="mb-3">--}}
{{--                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"--}}
{{--                       for="file_path"--}}
{{--                >--}}
{{--                    image--}}
{{--                </label>--}}
{{--                <input class="form-control"--}}
{{--                       type="file_path"--}}
{{--                       name="file_path"--}}
{{--                       id="file_path"--}}
{{--                       value="{{ old('file_path') }}"--}}
{{--                       required--}}
{{--                >--}}

{{--                @error('file_path')--}}
{{--                <p class="text-danger">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}
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
                       value="{{$iphone->message}}"
                       required
                >

                @error('message')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Change the selected image</label>
                <input type="file" name="file_path" class="form-control-file" id="image">
            </div>
            <div class="mb-3">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="active"
                >
                    Active
                </label>

                <select class="form-control"
                       name="is_active"
                       id="active"
                >
                    <option value="@if($iphone->is_active === 0) 0 @else 1 @endif">@if($iphone->is_active === 0) unactive @else active @endif</option>
                    @if($iphone->is_active === 0)
                    <option value="1">active</option>
                        @endif
                    @if($iphone->is_active === 1)
                        <option value="0">unactive</option>
                    @endif
                </select>

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



