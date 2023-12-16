@extends('layout.base')
@section('content')
    <p class="text-light big-title text-center">{{$city->city}}</p>
    <div class="d-flex justify-content-around">
        <p class="text-light medium-title m-2">Latitude: {{$city->latitude}}</p>
        <p class="text-light medium-title m-2">Country: {{$city->country}}</p>
        <p class="text-light medium-title m-2">Longitude: {{$city->longitude}}</p>
    </div>
    <div class="mx-auto">
        <p class="text-light small-title  text-center">5 closest cities to {{$city->city}}</p>
        @foreach ($closest as $x)
            <div class="bg-dark box-element m-5">
                <p class="text-light text-center small-title m-2">{{$x->city}}</p>
                <p class="text-light text-center m-2">Latitude: {{$x->latitude}}</p>
                <p class="text-light text-center m-2">Longitude: {{$x->longitude}}</p>
                <p class="text-light text-center m-2">Country: {{$x->country}}</p>
            </div>
        @endforeach
    </div>
    <div>
        <hr>
    </div>
@endsection