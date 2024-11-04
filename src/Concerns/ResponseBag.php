<?php

namespace Ahmdrv\MekariSign\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

trait ResponseBag
{
    /**
     * The last response received from a request.
     */
    protected ?Response $response = null;

    /**
     * Store the response after a request.
     *
     * @return void
     */
    protected function storeResponse(Response $response): Response
    {
        $this->response = $response;

        return $response;
    }

    /**
     * Get the last stored response.
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }

    /**
     * Get the response data in array format, if available.
     */
    public function getResponseData(): ?Collection
    {
        return $this->response?->collect('data');
    }

    /**
     * Get the response status code, if available.
     */
    public function getResponseStatusCode(): ?int
    {
        return $this->response?->status();
    }

    public function getDocumentId(): string
    {
        return $this->getResponseData()->get('id');
    }
}
