<?php

namespace App\Geoapify;

use App\Geoapify\Geoapify;

class Cities extends Geoapify
{
    public function __construct(string $city = "")
    {
        $this->city = $city;
        $this->setUrl(env("GEOAPIFY_CITIES_URL"));
        $this->setApiKey(env("GEOAPIFY_KEY"));
    }

    public function buildUrl()
    {
        $this->url = $this->getUrl()
                        .$this->city
                        .'&apiKey='.$this->api_key;;

        return $this;
    }
}