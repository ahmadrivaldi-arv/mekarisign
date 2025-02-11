<?php

namespace Ahmdrv\MekariSign\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait WithRequestMethod
{
    use ResponseBag, WithAuthentication;

    /**
     * Make a GET request
     */
    public function get(string $path, array $data = []): self
    {
        $this->response = $this->request('GET', $path, $data);

        return $this;
    }

    /**
     * Make a POST request
     */
    public function post(string $path, array $data = []): self
    {
        $this->response = $this->request('POST', $path, $data);

        return $this;
    }

    /**
     * Create http request
     *
     *
     * @return PendingRequest
     */
    public function request(string $method, string $path, array $data = []): Response
    {
        $http = Http::timeout(config('mekarisign.http_request_timeout'))
            ->baseUrl($this->baseUrl);

        $headers = $this->headers($method, $path);

        return $http->withHeaders($headers)->{$method}($path, $data);
    }
}
