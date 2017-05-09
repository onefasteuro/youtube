<?php

namespace Ytube;


class Ytube
{
    private $key;

    private $base_url;

    public function __construct($key)
    {
        $this->key = $key;
        $this->base_url = 'https://www.googleapis.com/youtube/v3/';
    }



    public function search($query)
    {
        $url = $this->base_url . 'search?' . $query .'&key='.$this->key;
        $response = Requests::get($url);
        return json_decode($response->body);
    }

}

