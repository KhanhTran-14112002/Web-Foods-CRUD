@extends('layouts.app')

@section('content')
    <h1>This is Foods Page</h1>
    {{--    <label>Choose a categories:</label>--}}
    {{--    <select name="category_id">--}}
    {{--        @foreach ($categories as $category)--}}
    {{--            <option value="{{ $category->id }}">--}}
    {{--                {{ $category->name }}--}}
    {{--            </option>--}}
    {{--        @endforeach--}}
    {{--    </select>--}}



    <a href="foods/warehouse"
       class="btn btn-primary"
       role="button">
        Foods Warehouse
    </a>

    <a style="margin-left: 50px"
       href="foods/search"
       class="btn btn-primary"
       role="button">
        Search Products
    </a>
    <div style="height: 3px; background-color: black"></div>

    <div class="container mt-3" >
        <form class="d-flex" method="get" >
            <div class="w-20">
                Chọn danh mục
            </div>
            <select class="form-select " aria-label="Default select example" name="category_id">
                <option value="" {{ !request()->has('category_id') ? 'selected' : '' }}>--Chọn quốc gia--</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}" {{ request()->input('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>


            <div class="form-group w-75">
                <label class="w-100" for=""><input name="search" type="text" class="form-control" id=""
                                                   placeholder="Name of Foods"></label>
            </div>
            <div class="form-group w-75">
                <label class="w-100" for=""><input name="description" type="text" class="form-control" id=""
                                                   placeholder="Description of Foods"></label>
            </div>
            <button type="submit" class="btn btn-success w-25 h-50">Submit</button>


        </form>

        <h2>
            List product in store:</h2>
        {{--===========================================================--}}

        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Food name</th>
                <th>Description</th>
                <th>Count</th>

            </tr>
            </thead>
            <tbody>
            @php
                $counter = 1; // Khởi tạo biến đếm
            @endphp
            @if(count($listfoods) > 0)
                @foreach ($listfoods as $food)
                    @if($food->is_active)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <td> {{ $food->count }}</td>
                            <td>
                                <a href="/foods/{{ $food->id }}" style="font-size: 25px">
                                    <button type="button" class="btn btn-success">Food detail</button>
                                </a>

                            </td>
                        </tr>
                    @endif
                @endforeach
            @elseif(count($listfoods) == 0)
                <p style="color: red">Không tìm thấy sảng phẩm</p>

            @endif


            </tbody>
        </table>
        <nav aria-label="Page navigation example justify-content-center">
            {{ $listfoods->appends(request()->all())->links() }}
        </nav>
    </div>

@endsection
