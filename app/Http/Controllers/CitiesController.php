<?php

namespace App\Http\Controllers;

use App\Geoapify\Cities as GeoapifyCities;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cities::get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($city)
    {
        $city_obj = new GeoapifyCities($city);

        return $city_obj->buildUrl()
                        ->getData()
                        ->json();
    }
}
