@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>index category</h1>
        <h2>khi xóa category thì sa pẩm trong category cũng bi xóa</h2>

        <div><h3>Search products:</h3></div>
        <form class="d-flex" method="get">

            <div class="form-group w-75">
                <label class="w-100" for=""><input name="search" type="text" class="form-control" id=""
                                                   placeholder="Search categories" value="{{ request()->input('search') }}"></label>
            </div>
            <button type="submit" class="btn btn-success w-25 h-50">Submit</button>
        </form>
        <a href="/categories/create"
           class="btn btn-success mt-5"
           role="button">
            Create a new Category
        </a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Category name</th>
                <th>Description</th>
                <th>Operation</th>

            </tr>
            </thead>
            <tbody>
            @php
                $counter = 1; // Khởi tạo biến đếm
            @endphp
            @if(count($categories) > 0)
                @foreach ($categories as $category)

                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/categories/{{ $category->id }}" style="font-size: 25px;margin-right: 10px">
                                        <button type="button" class="btn btn-success">Category detail</button>
                                    </a>

                                    <a href="/categories/{{ $category->id }}/edit"
                                       style="color: black; text-decoration: none;font-size: 25px;margin-right: 10px" class="ml-5">
                                        <button class="btn btn-primary">
                                            Edit
                                        </button>
                                    </a>
                                    <form class="mt-1" id="deleteForm" action="/categories/{{ $category->id }}" method="post" style="margin-right: 10px">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                            Xóa
                                        </button>
                                    </form>
                                </div>


                            </td>
                        </tr>

                @endforeach
            @else
                <tr><p>Categories is not avaiable</p></tr>
            @endif


            </tbody>
        </table>
    </div>
@endsection
