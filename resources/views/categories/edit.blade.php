@extends('layouts.app')

@section('content')

    <h1>Update a cate</h1>
    <form action="/categories/{{ $categories->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input class="form-control" type="text" name="name" value="{{ old('name', $categories->name) }}" placeholder="Enter category's name">
        <input class="form-control" type="text" name="description" value="{{ old('description', $categories->description) }}" placeholder="Enter category's description">
        <button class="btn btn-primary" type="submit">
            Update Food
        </button>
    </form>
    <button class="btn-primary"><a href="/categories">Back to Categories</a></button>
@endsection
