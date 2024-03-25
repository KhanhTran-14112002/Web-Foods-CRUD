@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="my-5 d-flex ">
            <a class="me-3" href="/categories">
                <button type="button" class="btn btn-primary">Back to Category List</button>
            </a>

        </div>
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

                            </div>
                        </div>

                    </div>
                    <div class="details col-md-7">
                        <h2 class="mb-3">{{ $category->name }}</h2>
                        <p style="font-size: 20px ;font-weight: lighter"
                           class="product-description px-3">{{ $category->description }}</p>

                        <p style="font-size: 20px" class="mt-4"><strong>100% quality</strong> products,
                            <strong>reputation </strong>guaranteed!
                        </p>

                    </div>

                </div>

            </div>
        </div>




        <div>Caác saản phẩm :</div>

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
            @if(count($foods) > 0)
                @foreach ($foods as $food)
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
            @elseif(count($foods) == 0)
                <p style="color: red">Không tìm thấy sảng phẩm</p>

            @endif


            </tbody>
        </table>

    </div>

@endsection
