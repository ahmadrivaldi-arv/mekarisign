<?php

namespace Ahmdrv\MekariSign\Concerns;

use Ahmdrv\MekariSign\Concerns\WithAuthentication;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait WithRequestMethod
{

    use WithAuthentication, ResponseBag;

    /**
     * Make a GET request
     *
     * @param string $path
     * @param array $data
     *
     * @return self
     */
    public function get(string $path, array $data = []): self
    {
        $this->response = $this->request("GET", $path, $data);

        return $this;
    }

    /**
     * Make a POST request
     *
     * @param string $path
     * @param array $data
     *
     * @return self
     */
    public function post(string $path, array $data = []): self
    {
        $this->response = $this->request("POST", $path, $data);

        return $this;
    }


    /**
     * Create http request
     *
     * @param string $method
     * @param string $path
     * @param array $data
     *
     * @return PendingRequest
     */
    public function request(string $method, string $path, array $data = []): Response
    {
        $http = Http::baseUrl($this->baseUrl);
        $headers = $this->headers($method, $path);

        return $http->withHeaders($headers)->{$method}($path, $data);
    }

}
