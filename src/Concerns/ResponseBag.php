<?php

namespace Ahmdrv\MekariSign\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

trait ResponseBag
{
    /**
     * The last response received from a request.
     *
     * @var Response|null
     */
    protected ?Response $response = null;

    /**
     * Store the response after a request.
     *
     * @param Response $response
     * @return void
     */
    protected function storeResponse(Response $response): Response
    {
        $this->response = $response;

        return $response;
    }

    /**
     * Get the last stored response.
     *
     * @return Response|null
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }

    /**
     * Get the response data in array format, if available.
     *
     * @return Collection|null
     */
    public function getResponseData(): ?Collection
    {
        return $this->response?->collect("data");
    }

    /**
     * Get the response status code, if available.
     *
     * @return int|null
     */
    public function getResponseStatusCode(): ?int
    {
        return $this->response?->status();
    }

    public function getDocumentId(): string
    {
        return $this->getResponseData()->get("id");
    }
}
