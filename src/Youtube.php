<?php

namespace Onefasteuro\Ytube;

use Requests;
use Requests_Session;

class Youtube
{
    private $key;

    private $base_url;

    public function __construct($key)
    {
        $this->key = $key;
        $this->base_url = 'https://www.googleapis.com/youtube/v3/';
    }

    private function formatUrl($endpoint, $query = [])
    {
        $query['key'] = $this->key;
        $query = http_build_query($query);
        $url = $this->base_url . $endpoint . '?' . $query;
        return $url;
    }


    public function search($query = [])
    {
        $url = $this->formatUrl('search', $query);
        $response = Requests::get($url);
        return json_decode($response->body);
    }

    public function videos($query = [])
    {
        $url = $this->formatUrl('videos', $query);
        $response = Requests::get($url);
        return json_decode($response->body);
    }


    public function channelVideos($channel, $query = [])
    {
        order=date&part=snippet&channelId={channel id here}&maxResults=25&key={YOUR_API_KEY}
        $url = $this->formatUrl('search', $query);
        $url .= '&channelId='.$channel.'&part=snippet&order=date';
        $response = Requests::get($url);
        return json_decode($response->body);
    }

}

