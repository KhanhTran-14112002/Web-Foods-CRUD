@extends('layouts.app')
@section('content')
    <h1>this is about</h1>
    @if(1<2)
        <h2>1 nho hon 2</h2>
    @elseif(1>2)
        <h2>1 lown hon 2</h2>
    @endif

    @foreach($names as $othername)
        <h1>{{$othername}}</h1>
    @endforeach
@endsection
