<?php
// app/Http/HttpWrapper.php

namespace App\Wrappers;

use Illuminate\Support\Facades\Http;

class AppHttp
{

    protected $baseUrl;
    protected $http;
    public function __construct()
    {
        $this->baseUrl = env('BOL_RETAILER_URL');
        $this->http = Http::withHeaders([
            'Accept' => 'application/vnd.retailer.v10+json',
            'Authorization' => 'Bearer ' . env('BOL_TOKEN')
        ])->baseUrl(env('BOL_RETAILER_URL'));
    }
    /**
     * Perform a GET request.
     *
     * @param string $url
     * @param array $options
     * @return \Illuminate\Http\Client\Response
     */
    public function get($url, $data = [], $options = [])
    {
        return $this->http->get($url, $data, $options);
    }

    /**
     * Perform a POST request.
     *
     * @param string $url
     * @param array $data
     * @param array $options
     * @return \Illuminate\Http\Client\Response
     */
    public function post($url, $data = [], $options = [])
    {
        return $this->http->post($url, $data, $options);
    }
}
