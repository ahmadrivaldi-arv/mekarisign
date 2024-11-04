<?php

namespace Ahmdrv\MekariSign\Concerns;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait WithAuthentication
{
    /**
     * Mekari client ID
     */
    protected string $clientId = '';

    /**
     * Mekari client secret
     */
    protected string $clientSecret = '';

    protected PendingRequest $http;

    /**
     * API base url
     */
    protected string $baseUrl = '';

    public function __construct()
    {
        $this->baseUrl = config('mekarisign.base_url');
        $this->clientId = config('mekarisign.client_id');
        $this->clientSecret = config('mekarisign.client_secret');

        $this->http = Http::baseUrl($this->baseUrl);
    }

    /**
     * Generate http headers
     */
    private function headers(string $method, string $path): array
    {
        $datetime = now()->toRfc7231String();

        return [
            'Date' => $datetime,
            'Authorization' => $this->signature($method, $path, $datetime),
        ];
    }

    /**
     * Generate HMAC authorization key
     */
    private function signature(string $method, string $path, string $datetime): string
    {
        $requestPath = parse_url($this->baseUrl, PHP_URL_PATH);

        $requestLine = sprintf(
            '%s %s%s HTTP/1.1',
            $method,
            $requestPath,
            $path

        );

        $payload = implode("\n", [
            "date: {$datetime}",
            $requestLine,
        ]);

        $hmac = base64_encode(hash_hmac('sha256', $payload, $this->clientSecret, true));

        return sprintf(
            'hmac username="%s", algorithm="hmac-sha256", headers="date request-line", signature="%s"',
            $this->clientId,
            $hmac
        );
    }
}
