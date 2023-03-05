<?php

namespace App\OpenWeather;

interface WeatherInterface
{
    public function setUrl(string $url);

    public function setCity(string $city);

    public function getUrl();

    public function getCity();

    public function buildUrl();

    public function getData();
}