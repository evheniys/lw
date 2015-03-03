@extends('layout')

@section('content')

    <h1>{{ $category->title }}</h1>

    <ul>
        @foreach($category->services as $service)
            <li>{{$service->title}}</li>

        @endforeach
    </ul>
@stop