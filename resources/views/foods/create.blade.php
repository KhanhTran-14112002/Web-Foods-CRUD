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




@extends('layouts.app')

@section('content')
    <h1>Enter food information</h1>
    <form action="/foods" method="post" enctype="multipart/form-data">
        @csrf
        {{-- the key is generated at every session start --}}
        {{-- only apply to non-read routes --}}
        {{-- If some hacker access to this site from hist/her site --}}
        <input class="form-control" type="file" name="image">
        <input class="form-control" type="text" name="name" placeholder="Enter food's name" value="{{ old('name') }}">
        <input class="form-control" type="text" name="description" placeholder="Enter food's description" value="{{ old('description') }}">
        <input class="form-control" type="text" name="count" placeholder="Enter food's count" value="{{ old('count') }}">
        <div>
            <label>Choose a category:</label>
            <select name="category_id">
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
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif
    <button class="btn-primary" ><a href="/foods">Back to Food List</a></button>
    <button class="btn-primary"><a href="/foods/warehouse">Back to Food Warehouse</a></button>
@endsection
