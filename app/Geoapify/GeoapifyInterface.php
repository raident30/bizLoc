<?php

namespace App\Geoapify;

interface GeoapifyInterface
{
    public function setUrl(string $url);

    public function setCategory(string $category);

    public function setLon(string $lon);

    public function setLat(string $lat);

    public function setLimit(int $limit = 0);

    public function setCity(string $city);

    public function setApiKey(string $api_key);

    public function getUrl();

    public function getCategory();

    public function getLon();

    public function getLat();

    public function getLimit();

    public function getCity();

    public function getApiKey();

    public function buildUrl();

    public function getData();
}