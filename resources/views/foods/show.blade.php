@extends('layouts.app')

@section('content')
    <h1>Show detail food</h1>
    <h3>Name: {{ $food->name }}</h3>
    <div style="border-radius: 50%">
        <img
            src="{{ asset('storage/' . $food->image_path) }}"
            alt="Sản phẩm hiện tại chưa có ảnh" style="width: 200px;height: 200px;border-radius: 50%">
    </div>

    <h3>Count: {{ $food->count }}</h3>
    <h3>Description: {{ $food->description }}</h3>
    <h3>CategoryId: {{ $food->category_id }}</h3>
    <h3>Category's name: {{ $food->category->name }}</h3>
    {{--    <button class="btn-primary" ><a href="/foods">Back to Food List</a></button>--}}
    <a href="/foods">
        <button type="button" class="btn btn-danger">Back to Food List</button>
    </a>
    <a href="/foods/warehouse">
        <button type="button" class="btn btn-warning">Back to Food Warehouse</button>
    </a>
@endsection
