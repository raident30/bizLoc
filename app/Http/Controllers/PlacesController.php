<?php

namespace App\Http\Controllers;

use App\Geoapify\Places;
use Illuminate\Http\Request;

class PlacesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Places $places)
    {        
        return $places->setCategory($request->get('category'))
                            ->setLon($request->get('lon'))
                            ->setLat($request->get('lat'))
                            ->setLimit(10)
                            ->buildUrl()
                            ->getData()
                            ->json();
    }

}
