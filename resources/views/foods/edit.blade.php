{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <h1>Update a food</h1>--}}
{{--    <img src="{{ asset('storage/' . $food->image_path) }}" alt="Food Image" width="150" style="border-radius: 50%">--}}
{{--    <form action="/foods/{{ $food-> id }}" method="post"  enctype="multipart/form-data" >--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <div class="form-group">--}}
{{--            <label for="image">Image</label>--}}
{{--            <input--}}
{{--                class="form-control-file"--}}
{{--                type="file"--}}
{{--                name="image"--}}
{{--                id="image"--}}
{{--                value="{{$food->image_path}}">--}}
{{--        </div>--}}
{{--        <input--}}
{{--            class="form-control"--}}
{{--            type="text"--}}
{{--            name="name"--}}
{{--            value="{{$food->name}}"--}}
{{--            placeholder="Enter food's name">--}}
{{--        <input--}}
{{--            class="form-control"--}}
{{--            type="text"--}}
{{--            name="description"--}}
{{--            value="{{$food->description}}"--}}
{{--            placeholder="Enter food's description">--}}
{{--        <input--}}
{{--            class="form-control"--}}
{{--            type="text"--}}
{{--            name="count"--}}
{{--            value="{{$food->count}}"--}}
{{--            placeholder="Enter food's count">--}}
{{--        <div>--}}
{{--            <label>Choose a categories:</label>--}}
{{--            <select name="category_id"--}}
{{--            >--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">--}}
{{--                        {{ $category->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <label>--}}
{{--            <input type="checkbox" name="is_active" {{ $food->is_active ? 'checked' : '' }}>--}}
{{--            Active--}}
{{--        </label>--}}
{{--        <br>--}}
{{--        <button--}}
{{--            class="btn btn-primary"--}}
{{--            type="submit">--}}
{{--            Update Food--}}
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
{{--    <button class="btn-primary"><a href="/foods">Back to Food List</a></button>--}}
{{--    <button class="btn-primary"><a href="/foods/warehouse">Back to Food Warehouse</a></button>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <h1>Update a food</h1>
    <img src="{{ asset('storage/' . $food->image_path) }}" alt="Food Image" width="150" style="border-radius: 50%">
    <form action="/foods/{{ $food->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control-file" type="file" name="image" id="image">
        </div>
        <input class="form-control" type="text" name="name" value="{{ old('name', $food->name) }}" placeholder="Enter food's name">
        <input class="form-control" type="text" name="description" value="{{ old('description', $food->description) }}" placeholder="Enter food's description">
        <input class="form-control" type="text" name="count" value="{{ old('count', $food->count) }}" placeholder="Enter food's count">
{{--        <div>--}}
{{--            <label>Choose a category:</label>--}}
{{--            <select name="category_id">--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}" {{ old('category_id', $food->category_id) == $category->id ? 'selected' : '' }}>--}}
{{--                        {{ $category->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

        <div>
            <label>Choose a categories:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $foodCategory->id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>


{{--        <div>--}}
{{--            <label>Choose a categories:</label>--}}
{{--            <select name="category_id"--}}

{{--            >--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">--}}
{{--                        {{ $category->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
        <label>
            <input type="checkbox" name="is_active" {{ old('is_active', $food->is_active) ? 'checked' : '' }}>
            Active
        </label>
        <br>
        <button class="btn btn-primary" type="submit">
            Update Food
        </button>
    </form>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif
    <button class="btn-primary"><a href="/foods">Back to Food List</a></button>
    <button class="btn-primary"><a href="/foods/warehouse">Back to Food Warehouse</a></button>
@endsection
