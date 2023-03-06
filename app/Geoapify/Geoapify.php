<?php

namespace App\Geoapify;

use App\Geoapify\GeoapifyInterface;
use Illuminate\Support\Facades\Http;

abstract class Geoapify implements GeoapifyInterface
{
    protected $url = "";

    protected $category = "";

    protected $lon = "";

    protected $lat = "";

    protected $limit = 0;

    protected $city = "";

    protected $api_key = "";


    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
        return $this;
    }

    public function setLon(string $lon)
    {
        $this->lon = $lon;
        return $this;
    }

    public function setLat(string $lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function setLimit(int $limit = 0)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    public function setApiKey(string $api_key)
    {
        $this->api_key = $api_key;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getData()
    {
        return Http::get($this->url);
    }
}