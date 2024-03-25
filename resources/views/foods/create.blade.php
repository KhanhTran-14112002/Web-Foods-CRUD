{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <h1>Enter food information</h1>--}}
{{--    <form action="/foods" method="post"--}}
{{--          enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        --}}{{-- the key is generated at every session start --}}
{{--        --}}{{-- only apply to non-read routes --}}
{{--        --}}{{-- If some hacker access to this site from hist/her site --}}
{{--        <input class="form-control"--}}
{{--               type="file" name="image"--}}
{{--        >--}}
{{--        <input class="form-control"--}}
{{--               type="text" name="name"--}}
{{--               placeholder="Enter food's name">--}}
{{--        <input class="form-control" type="text" name="description" placeholder="Enter food's description">--}}
{{--        <input class="form-control" type="text" name="count" placeholder="Enter food's count">--}}
{{--        <div>--}}
{{--            <label>Choose a categories:</label>--}}
{{--            <select name="category_id">--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">--}}
{{--                        {{ $category->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <label>--}}
{{--            <input type="checkbox" name="is_active" {{ $is_active ? 'checked' : '' }}>--}}
{{--            Active--}}
{{--        </label>--}}
{{--        <br>--}}
{{--        <button class="btn btn-primary" type="submit">--}}
{{--            Submit--}}
{{--        </button>--}}
{{--    </form>--}}
{{--    @if ($errors->any())--}}
{{--        <div>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <p class="text-danger">--}}
{{--                    {{ $error }}--}}
{{--                </p>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <button class="btn-primary" ><a href="/foods">Back to Food List</a></button>--}}
{{--    <button class="btn-primary"><a href="/foods/warehouse">Back to Food Warehouse</a></button>--}}
{{--@endsection--}}


<link rel="stylesheet" href="{{ asset('css/foods/create.css') }}">


@extends('layouts.app')

@section('content')

    <div class="container ">
        <div style="background: linear-gradient(to right, rgb(225, 64, 180), rgb(126, 43, 237));border-radius: 10px">
            <h1 style="text-align: center;">Enter food information</h1>

        <form action="/foods" method="post" enctype="multipart/form-data" class="p-5" >
            @csrf
            {{-- the key is generated at every session start --}}
            {{-- only apply to non-read routes --}}
            {{-- If some hacker access to this site from hist/her site --}}

{{--            <input class="form-control" type="text" name="name" placeholder="Enter food's name"--}}
{{--                   value="{{ old('name') }}">--}}
{{--            <input class="form-control" type="text" name="description" placeholder="Enter food's description"--}}
{{--                   value="{{ old('description') }}">--}}
{{--            <input class="form-control" type="text" name="count" placeholder="Enter food's count"--}}
{{--                   value="{{ old('count') }}">--}}
            <div class="form-group">
                <label for="name">Name of product</label>
                <input id="name" class="form-control" type="text" name="name" placeholder="Enter food's name"
                       value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Description of product</label>
                <input id="description" class="form-control" type="text" name="description" placeholder="Enter food's description"
                       value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="count">Count of product</label>
                <input id="count" class="form-control" type="text" name="count" placeholder="Enter food's count"
                       value="{{ old('count') }}">
            </div>
            <div class="form-group">
                <label for="image">Image of category:</label>
                <input id="image" class="form-control" type="file" name="image">
            </div>
            <div class="form-group">
                <label for="category_id">Choose a category:</label>
                <select id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label>
                <input type="checkbox" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
                Active
            </label>
            <br>
            <button class="btn btn-primary" type="submit">
                Submit
            </button>
        </form>

        </div>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p class="text-danger">
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
        <div class="my-5 ">
            <a class="me-3" href="/foods">
                <button type="button" class="btn btn-primary">Back to Food List</button>
            </a>
            <a href="/foods/warehouse">
                <button type="button" class="btn btn-primary">Back to Food Warehouse</button>
            </a>
        </div>
    </div>





@endsection
