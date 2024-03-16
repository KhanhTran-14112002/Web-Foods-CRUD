@extends('layouts.app')

@section('content')
    <h1>This is Foods Warehouse</h1>

    <a href="/foods/create"
       class="btn btn-success"
       role="button">
        Create a new Food
    </a>
    <a href="/foods"
       class="btn btn-primary"
       role="button">
        Back to list foods
    </a>



    <a style="margin-left: 50px"
       href="/foods/search"
       class="btn btn-primary"
       role="button">
        Search Products
    </a>

    <div style="height: 3px; background-color: black;margin-top: 3rem"></div>


    {{--    @foreach ($foods as $food)--}}
    {{--        <li class="list-group-item d-flex justify-content-between align-items-start">--}}
    {{--            <div class="ms-2 me-auto">--}}
    {{--                <div class="fw-bold">--}}
    {{--                    <a href="/foods/{{ $food->id }}" style="font-size: 25px">--}}

    {{--                        {{ $food->name }}--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--                <h6> {{ $food->description }}</h6>--}}

    {{--            </div>--}}
    {{--            <span class="badge bg-primary rounded-pill" style="margin-right: 30px;line-height: 30px">--}}
    {{--        {{ $food->count }}--}}
    {{--    </span>--}}
    {{--            <button class="btn btn-primary">--}}
    {{--                <a href="/foods/{{ $food->id }}/edit" style="color: black; text-decoration: none">--}}
    {{--                    Edit--}}
    {{--                </a>--}}
    {{--            </button>--}}

    {{--            --}}{{--            Delete a food--}}
    {{--            <form id="deleteForm" action="/foods/{{ $food->id }}" method="post">--}}
    {{--                @csrf--}}
    {{--                @method('delete')--}}
    {{--                <button type="submit" class="btn btn-danger" style="margin-left: 30px"--}}
    {{--                        onclick="return confirm('Bạn có chắc muốn xóa?')">--}}
    {{--                    Xóa--}}
    {{--                </button>--}}
    {{--            </form>--}}
    {{--        </li>--}}
    {{--        <div style="height: 1px;background-color: #1a202c"></div>--}}

    {{--    @endforeach--}}


    <div class="container mt-3">
        <h2>Products in stock:</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Food name</th>
                <th>Description</th>
                <th>Count</th>
                <th>#</th>

            </tr>
            </thead>
            <tbody>
            @php
                $counter = 1; // Khởi tạo biến đếm
            @endphp
            @foreach ($foods as $food)

                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->description }}</td>
                    <td> {{ $food->count }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="/foods/{{ $food->id }}" style="font-size: 25px">
                                <button type="button" class="btn btn-success">Food detail</button>
                            </a>
                            <a href="/foods/{{ $food->id }}/edit"
                               style="color: black; text-decoration: none;font-size: 25px">
                                <button class="btn btn-primary">
                                    Edit
                                </button>
                            </a>
                            <form id="deleteForm" action="/foods/{{ $food->id }}" method="post">
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
            </tbody>
        </table>
    </div>
@endsection
