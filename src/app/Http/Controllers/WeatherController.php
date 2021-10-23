<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function forecastWeather(){
        $carbon = new Carbon();
        $dates = [];
        for($i = 0; $i < 8; $i++){
            array_push($dates, $carbon->format('n/j'));
            $carbon->addDays(1);
            // dd($carbon);
        }
        // dd($dates);
        return view('Weather.forecast')->with('dates', $dates);
    }
}
