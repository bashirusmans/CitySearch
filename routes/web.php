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
    $cityList = City::all();
    function haversine($lat1, $lon1, $lat2, $lon2) {
        // Convert latitude and longitude from degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
    
        // Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat / 2)**2 + cos($lat1) * cos($lat2) * sin($dlon / 2)**2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = 6371 * $c;  // Radius of the Earth in kilometers (you can use 3959 for miles)
    
        return $distance;
    }
    
    // Function to find the closest 5 cities
    function findClosestCities($referenceCity, $cityList) {
        $distances = array();
        
        // Calculate distances from the reference city to all other cities
        foreach ($cityList as $city) {
            if($city->city){
                $distances[$city->id] = haversine($referenceCity->latitude, $referenceCity->longitude, $city->latitude, $city->longitude);
            }    
        }
    
        // Sort cities based on distances
        // dd($distances);
        asort($distances);
        
        // Get the closest 5 cities
        $closestCities = array_slice($distances, 1, 5, true);
    
        return $closestCities;
    }

    

    $closestids = array_keys(findClosestCities($cityobj, $cityList));
 
    $closest = City::find($closestids);


    return view('cities',['city'=>$cityobj, 'closest'=>$closest]);
});