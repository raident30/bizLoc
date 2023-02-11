<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlacesController extends Controller
{
    protected $url      = "";
    protected $category = "";
    protected $lon      = "";
    protected $lat      = "";
    protected $limit    = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setCategory($request);
        $this->setUrl();
        
        $response = Http::get($this->url);

        return $response->json();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function setUrl()
    {
        $this->url = 'https://api.geoapify.com/v2/places?categories='.$this->category.'&filter=circle:'.$this->lon.','.$this->lat.',5000&limit='.$this->limit.'&apiKey='.env("GEOAPIFY_KEY");
    }

    protected function setCategory($request)
    {
        $this->category = $request->get('category');
        $this->lon      = $request->get('lon');
        $this->lat      = $request->get('lat');
    }
}
