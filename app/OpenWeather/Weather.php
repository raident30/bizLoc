<?php

namespace App\OpenWeather;

use App\OpenWeather\BaseWeather;

class Weather extends BaseWeather
{
    public function __construct()
    {
        $this->setUrl(env("OPENWEATHER_CITY_URL"));
        $this->setApiKey(env("OPENWEATHER_KEY"));
    }

    public function buildUrl()
    {
        $this->url = $this->getUrl()
                        .$this->city.'&appid='
                        .$this->api_key."&units=metric";
        return $this;
    }
}