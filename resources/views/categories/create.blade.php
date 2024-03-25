
<link rel="stylesheet" href="{{ asset('css/categories/create.css') }}">


@extends('layouts.app')

@section('content')

    <div class="container ">
        <div style="background: linear-gradient(to right, rgb(225, 64, 180), rgb(126, 43, 237));border-radius: 10px">
            <h1 style="text-align: center;">Enter category information</h1>

            <form action="/categories" method="post" enctype="multipart/form-data" class="p-5" >
                @csrf
                <div class="form-group">
                    <label for="name">Name of category</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="Enter food's name"
                           value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="description">Description of category</label>
                    <input id="description" class="form-control" type="text" name="description" placeholder="Enter food's description"
                           value="{{ old('description') }}">
                </div>
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
