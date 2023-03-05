<?php

namespace App\OpenWeather;

use App\OpenWeather\WeatherInterface;
use Illuminate\Support\Facades\Http;

abstract class BaseWeather implements WeatherInterface
{
    protected $url = "";

    protected $city = "";

    protected $api_key = "";

    public function setUrl(string $url)
    {
        $this->url = $url;
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