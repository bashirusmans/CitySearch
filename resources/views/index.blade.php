@extends('layout.base')
@section('content')

    @php
        $cities = json_encode($cities);
        echo "<p id='cities' style='display:none'>$cities</p>";
    @endphp
    
    <div>
        <input id="city" type="text" placeholder="Enter a city" name="city">
        <ul id="city_list">
        </ul>
    </div>
@endsection