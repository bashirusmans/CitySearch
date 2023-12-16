@extends('layout.base')
@section('content')

    @php
        $cities = json_encode($cities);
        echo "<p id='cities' style='display:none'>$cities</p>";
    @endphp
    
    <div class="d-flex justify-content-center">
        <input class="rounded-5 p-3 m-5" id="city" type="text" placeholder="Enter a city" name="city">
    </div>
    <div class="d-flex justify-content-center m-2">
        <div id="hide" class="box-element bg-dark hide" style="width: 30%">
            <div id="city_list">
            </div>
        </div>
    </div>
    <hr>
@endsection