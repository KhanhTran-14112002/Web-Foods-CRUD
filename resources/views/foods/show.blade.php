@extends('layouts.app')

@section('content')

    {{--    <button class="btn-primary" ><a href="/foods">Back to Food List</a></button>--}}



    {{--    <div class="container mt-3">--}}
    {{--        <div><h1>Chi tiêt sản phẩm</h1></div>--}}

    {{--        <div class="d-flex w-100 mb-2" style="background-color: #d9d5d5 ">--}}
    {{--            <div class="w-50 ">--}}
    {{--                @if( $food->image_path)--}}
    {{--                    <img--}}
    {{--                        src="{{ asset('storage/' . $food->image_path) }}"--}}
    {{--                        style=" border-radius: 10px;--}}
    {{--                            width: 30%;--}}
    {{--                            height: 250px;--}}
    {{--                            background-size: cover;--}}
    {{--                            background-position: center;"--}}
    {{--                        class="w-100" alt="San pham hiện chưa có ảnh">--}}
    {{--                @else--}}
    {{--                    <img--}}
    {{--                        src="{{ asset('storage/no_img.png') }}"--}}
    {{--                        style=" border-radius: 10px;--}}
    {{--                            width: 30%;--}}
    {{--                            height: 250px;--}}
    {{--                            background-size: cover;--}}
    {{--                            background-position: center;"--}}
    {{--                        class="w-100" alt="San pham hiện chưa có ảnh">--}}
    {{--                @endif</div>--}}
    {{--            <div class="p-3">--}}
    {{--                <h1>{{ $food->name }}</h1>--}}
    {{--                <h4 class="m-3">Count: <small>{{ $food->count }} items</small></h4>--}}
    {{--                @if( $food->description )--}}
    {{--                    <h4 class="m-3">Description: <small> {{ $food->description }}</small></h4>--}}
    {{--                @else--}}
    {{--                    <h4 class="m-3">Description:<small> Product has no description yet</small></h4>--}}
    {{--                @endif--}}
    {{--                <h4 class="m-3">Description:<small> {{ $food->description }}</small></h4>--}}
    {{--                <h4 class="m-3">CategoryId: <small>{{ $food->category_id }}</small></h4>--}}
    {{--                <h4 class="m-3">Category's name:<small> {{ $food->category->name }}</small></h4>--}}

    {{--            </div>--}}
    {{--        </div>--}}

    {{--            <a class="me-3" href="/foods">--}}
    {{--                <button type="button" class="btn btn-danger">Back to Food List</button>--}}
    {{--            </a>--}}
    {{--            <a href="/foods/warehouse">--}}
    {{--                <button type="button" class="btn btn-warning">Back to Food Warehouse</button>--}}
    {{--            </a>--}}
    {{--    </div>--}}





    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card">
            <div class="container-fliud">

                <div class="wrapper row">
                    <div class="preview col-md-5">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-3">
                                @if( $food->image_path)
                                    <img
                                        style="width: 450px;height: 400px ;border-radius: 10px"
                                        src="{{ asset('storage/' . $food->image_path) }}">
                                @else
                                    <img style="width: 350px;height: 400px ;border-radius: 10px"
                                         src="{{ asset('storage/no_img.png') }}">
                                @endif

                            </div>
                        </div>

                    </div>
                    <div class="details col-md-7">
                        <h2 class="mb-3">{{ $food->name }}</h2>
                        <p style="font-size: 25px;" class="mb-3">The food from
                            <strong>{{ $food->category->name }}</strong>
                        </p>
                        <p style="font-size: 20px ;font-weight: lighter"
                           class="product-description px-3">{{ $food->category->description }}</p>

                        <p style="font-size: 20px" class="mt-4"><strong>100% quality</strong> products,
                            <strong>reputation </strong>guaranteed!
                        </p>

                    </div>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <h3>Detailed information about Products</h3>
                <div class="row ">

                    <div class="d-flex">
                        <label style="font-weight: 500; color: #9999a0;font-size: 20px;width: 250px ">Description</label>
                        @if( $food->description )
                            <p style="font-size: 20px">{{$food->description}}</p>
                        @else

                            <p style="font-size: 20px">Product has no description yet</p>
                        @endif


                    </div>
                    <div class="d-flex">
                        <label style="font-weight: 500 ; color: #9999a0;font-size: 20px;width: 250px">The number of products</label>
                        @if($food->count==0)
                            <p style="font-size: 20px;color: red">
                                Sold out</p>
                        @else
                            <p style="font-size: 20px">{{$food->count}} items</p>
                        @endif

                    </div>


                </div>
            </div>
        </div>
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
