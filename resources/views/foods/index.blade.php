@extends('layouts.app')

@section('content')
    <h1 style="text-align: center;">This is Foods Page</h1>
    {{--    <label>Choose a categories:</label>--}}
    {{--    <select name="category_id">--}}
    {{--        @foreach ($categories as $category)--}}
    {{--            <option value="{{ $category->id }}">--}}
    {{--                {{ $category->name }}--}}
    {{--            </option>--}}
    {{--        @endforeach--}}
    {{--    </select>--}}



    <div class="container mt-3" >
        {{--        <form class="d-flex" method="get" >--}}
        {{--            <div class="w-20">--}}
        {{--                Chọn danh mục--}}
        {{--            </div>--}}
        {{--            <label for="category_id">Chọn danh mục</label>--}}
        {{--            <select id="category_id" class="form-select " aria-label="Default select example" name="category_id">--}}
        {{--                <option value="" {{ !request()->has('category_id') ? 'selected' : '' }}>--Chọn quốc gia--</option>--}}
        {{--                @foreach ($categories as $category)--}}
        {{--                    <option--}}
        {{--                        value="{{ $category->id }}" {{ request()->input('category_id') == $category->id ? 'selected' : '' }}>--}}
        {{--                        {{ $category->name }}--}}
        {{--                    </option>--}}
        {{--                @endforeach--}}
        {{--            </select>--}}


        {{--            <div class="form-group w-75">--}}
        {{--                <label class="w-100" for=""><input name="search" type="text" class="form-control" id=""--}}
        {{--                                                   placeholder="Name of Foods"></label>--}}
        {{--            </div>--}}
        {{--            <div class="form-group w-75">--}}
        {{--                <label class="w-100" for=""><input name="description" type="text" class="form-control" id=""--}}
        {{--                                                   placeholder="Description of Foods"></label>--}}
        {{--            </div>--}}
        {{--            <button type="submit" class="btn btn-success w-25 h-50">Submit</button>--}}


        {{--        </form>--}}

        <div><h3>Search products:</h3></div>
        <form class="d-flex" method="get">
            {{-- <div class="w-20">--}}
            {{-- Chọn danh mục--}}
            {{-- </div>--}}
            <select id="category_id" class="form-select " aria-label="Default select example" name="category_id">
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
                                                   placeholder="Name of Foods" value="{{ request()->input('search') }}"></label>
            </div>
{{--            <div class="form-group w-75">--}}
{{--                <label class="w-100" for=""><input name="description" type="text" class="form-control" id=""--}}
{{--                                                   placeholder="Description of Foods"--}}
{{--                                                   value="{{ request()->input('description') }}"></label>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-success w-25 h-50">Submit</button>
        </form>


        <h2 class="mt-5">
            List product in store:</h2>
        {{--===========================================================--}}

        {{--        <table class="table table-striped">--}}
        {{--            <thead>--}}
        {{--            <tr>--}}
        {{--                <th>STT</th>--}}
        {{--                <th>Food name</th>--}}
        {{--                <th>Description</th>--}}
        {{--                <th>Count</th>--}}

        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody>--}}
        {{--            @php--}}
        {{--                $counter = 1; // Khởi tạo biến đếm--}}
        {{--            @endphp--}}
        {{--            @if(count($listfoods) > 0)--}}
        {{--                @foreach ($listfoods as $food)--}}
        {{--                    @if($food->is_active)--}}
        {{--                        <tr>--}}
        {{--                            <td>{{ $counter++ }}</td>--}}
        {{--                            <td>{{ $food->name }}</td>--}}
        {{--                            <td>{{ $food->description }}</td>--}}
        {{--                            <td> {{ $food->count }}</td>--}}
        {{--                            <td>--}}
        {{--                                <a href="/foods/{{ $food->id }}" style="font-size: 25px">--}}
        {{--                                    <button type="button" class="btn btn-success">Food detail</button>--}}
        {{--                                </a>--}}

        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                    @endif--}}
        {{--                @endforeach--}}
        {{--            @elseif(count($listfoods) == 0)--}}
        {{--                <p style="color: red">Không tìm thấy sảng phẩm</p>--}}

        {{--            @endif--}}


        {{--            </tbody>--}}
        {{--        </table>--}}

        <div class="d-flex flex-wrap container mt-3 justify-content-between">
            @if(count($listfoods) > 0)
                @foreach ($listfoods as $food)
                    @if($food->is_active)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-5 p-3">
                            <div>
                                @if( $food->image_path)
                                    <img
                                            src="{{ asset('storage/' . $food->image_path) }}"
                                            style=" border-radius: 10px;
                                            width: 30%;
                                            height: 250px;
                                            background-size: cover;
                                            background-position: center;"
                                            class="w-100" alt="San pham hiện chưa có ảnh">
                                @else
                                    <img
                                            src="{{ asset('storage/no_img.png') }}"
                                            style=" border-radius: 10px;
                                            width: 30%;
                                            height: 250px;
                                            background-size: cover;
                                            background-position: center;"
                                            class="w-100" alt="San pham hiện chưa có ảnh">
                                @endif
                            </div>
                            <div>
                                <h3 style="height: 70px">{{ $food->name }}</h3>
                                <div>

                                    @if( $food->description )
                                        <p style="height: 60px"><strong>Description: </strong> {{ $food->description }}</p>
                                    @else
                                        <p style="height: 60px"><strong>Description: </strong>Product has no description yet.</p>
                                    @endif
                                    <p><strong>Count:</strong> {{ $food->count }} items</p>
                                    <a href="/foods/{{ $food->id }}" style="font-size: 25px">
                                        <button type="button" class="btn btn-success">Food detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>
        @elseif(count($listfoods) == 0)
            <p style="color: red">Không tìm thấy sảng phẩm</p>

        @endif


        <nav aria-label="Page navigation example justify-content-center">
            {{ $listfoods->appends(request()->all())->links() }}
        </nav>
        <a href="/foods/warehouse"
           class="btn btn-primary"
           role="button">
            Foods Warehouse
        </a>
    </div>

@endsection
