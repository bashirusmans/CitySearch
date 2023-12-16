<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $cities = City::all();

    // Initialize an array to store non-empty city names
    $cityNames = [];

    // Loop through $cities and store non-empty city names in the array
    foreach ($cities as $city) {
        // Check if the 'city' attribute is not an empty string
        if ($city->city !== '') {
            $cityNames[] = $city->city;
        }
    }
    return view('index',['cities'=>$cityNames]);
});

Route::get('/{city}',function($city){
    $cityobj = City::where('city', $city)->first();
    return view('cities',['city'=>$cityobj]);
});