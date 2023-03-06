<?php

namespace App\Http\Controllers;

use App\OpenWeather\Weather;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Weather $weather)
    {
        return $weather->setCity($request->get('city'))
                        ->buildUrl()
                        ->getData()
                        ->json();
    }
}
