@extends('layout.base')
@section('content')
    <p class="text-light big-title text-center">{{$city->city}}</p>
    <div class="d-flex justify-content-between">
        <p class="text-light medium-title">Latitude: {{$city->latitude}}</p>
        <p class="text-light medium-title">Country: {{$city->country}}</p>
        <p class="text-light medium-title">Longitude: {{$city->longitude}}</p>
    </div>
@endsection