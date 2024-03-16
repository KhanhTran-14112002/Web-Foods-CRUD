@extends('layouts.app')

@section('content')

    <form class="border border-primary p-2 row" action="{{ url('/foods/search') }}" method="get">
        <input name="tukhoa" class="border border-primary p-2 col-6" placeholder="Search foods">
        <button type="submit" class="btn btn-primary p-2 col-2">Search</button>

    </form>
    <a href="/foods"
       class="btn btn-primary"
       role="button">
        Back to list foods
    </a>

    <h2>
        Result:</h2>
    @if(count($listfoods) > 0)
        @foreach ($listfoods as $food)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        <a href="/foods/{{ $food->id }}" style="font-size: 25px">

                            {{ $food->name }}
                        </a>
                    </div>
                    <h6> {{ $food->description }}</h6>
                </div>
                <span class="badge bg-primary rounded-pill" style="margin-right: 30px;line-height: 30px">
                {{ $food->count }}
            </span>
            </li>
            <div style="height: 1px;background-color: #1a202c"></div>
        @endforeach
    @else
        <!-- Hiển thị nội dung nếu mảng rỗng -->
        <p>Food is not available</p>
    @endif
@endsection
