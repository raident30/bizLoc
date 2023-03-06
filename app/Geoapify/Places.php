<?php

namespace App\Geoapify;

use App\Geoapify\Geoapify;

class Places extends Geoapify
{
    public function __construct()
    {
        $this->setUrl(env("GEOAPIFY_PLACES_URL"));
        $this->setApiKey(env("GEOAPIFY_KEY"));
    }

    public function buildUrl()
    {
        $this->url = $this->getUrl()
                        .$this->category.'&filter=circle:'
                        .$this->lon.','.$this->lat
                        .',5000&limit='.$this->limit
                        .'&apiKey='.$this->api_key;

        return $this;
    }
}