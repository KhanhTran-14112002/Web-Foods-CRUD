@extends('layouts.app')

@section('content')
    <h1 style="text-align: center;">This is Foods Warehouse</h1>

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
        <div><h3>Search products:</h3></div>
        <form class="d-flex" method="get">

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
                                                   placeholder="Name of Foods" value="{{ request()->input('search') }}"></label>
            </div>
            {{--            <div class="form-group w-75">--}}
            {{--                <label class="w-100" for=""><input name="description" type="text" class="form-control" id=""--}}
            {{--                                                   placeholder="Description of Foods" value="{{ request()->input('description') }}"></label>--}}
            {{--            </div>--}}
            <button type="submit" class="btn btn-success w-25 h-50">Submit</button>
        </form>



        <div class="mt-5 d-flex justify-content-between ">
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
        </div>

        <h2 class="pt-5">Products in stock:</h2>
{{--        <table class="table table-striped">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>STT</th>--}}
{{--                <th>Food name</th>--}}
{{--                <th>Description</th>--}}
{{--                <th>Count</th>--}}
{{--                <th>#</th>--}}

{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @php--}}
{{--                $counter = 1; // Khởi tạo biến đếm--}}
{{--            @endphp--}}
{{--            @if(count($listfoods) > 0)--}}
{{--                @foreach ($listfoods as $food)--}}

{{--                    <tr>--}}
{{--                        <td>{{ $counter++ }}</td>--}}
{{--                        <td>{{ $food->name }}</td>--}}
{{--                        <td>{{ $food->description }}</td>--}}
{{--                        <td> {{ $food->count }}</td>--}}
{{--                        <td>--}}
{{--                            <div class="d-flex">--}}
{{--                                <a href="/foods/{{ $food->id }}" style="font-size: 25px">--}}
{{--                                    <button type="button" class="btn btn-success">Food detail</button>--}}
{{--                                </a>--}}
{{--                                <a href="/foods/{{ $food->id }}/edit"--}}
{{--                                   style="color: black; text-decoration: none;font-size: 25px">--}}
{{--                                    <button class="btn btn-primary">--}}
{{--                                        Edit--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                <form id="deleteForm" action="/foods/{{ $food->id }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit" class="btn btn-danger"--}}
{{--                                            onclick="return confirm('Bạn có chắc muốn xóa?')">--}}
{{--                                        Xóa--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}


{{--                        </td>--}}
{{--                    </tr>--}}

{{--                @endforeach--}}
{{--            @else--}}
{{--                <p style="color: red">Không tìm thấy sảng phẩm</p>--}}
{{--            @endif--}}
{{--            </tbody>--}}
{{--        </table>--}}


        <div class="d-flex flex-wrap container mt-3 justify-content-between">
            @if(count($listfoods) > 0)
                @foreach ($listfoods as $food)
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
                            <h3>{{ $food->name }}</h3>
                            <div>

                                @if( $food->description )
                                    <p>Description: {{ $food->description }}</p>
                                @else
                                    <p>Description: Product has no description yet.</p>
                                @endif
                                <p>Count: {{ $food->count }} items</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <a href="/foods/{{ $food->id }}"
                                           style="font-size: 25px;margin-right: 10px">
                                            <button type="button" class="btn btn-success">Food detail</button>
                                        </a>
                                        <div></div>
                                        <a href="/foods/{{ $food->id }}/edit"
                                           style="color: black;font-size: 25px">
                                            <button class="btn btn-primary" style="text-decoration-style: solid">
                                                Edit
                                            </button>
                                        </a>
                                    </div>

                                    <form class="mt-1" id="deleteForm" action="/foods/{{ $food->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                            Xóa
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        @elseif(count($listfoods) == 0)
            <p style="color: red">Không tìm thấy sản phẩm</p>

        @endif
        <nav aria-label="Page navigation example justify-content-center">
            {{ $listfoods->appends(request()->all())->links() }}
        </nav>

    </div>


@endsection
