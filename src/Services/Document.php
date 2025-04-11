<?php

namespace Ahmdrv\MekariSign\Services;

use Ahmdrv\MekariSign\Concerns\WithRequestMethod;

class Document
{
    use WithRequestMethod;

    protected array $document = [];

    public function getDocumentId(): ?string
    {
        if (empty($this->document)) {
            throw new \Exception('Unable to get detail of document');
        }

        return $this->document['data']['id'];

    }

    /**
     * Create a new instance of the class with the given document ID.
     *
     * @param  string  $documentId  The ID of the document.
     * @return static A new instance of the class.
     */
    public static function of(string $documentId): static
    {
        $app = app(self::class)->getDocument($documentId);

        return $app;
    }

    /**
     * Download the document.
     *
     * @return mixed The response from the download request.
     */
    public function download(): mixed
    {
        return $this->get("/documents/{$this->getDocumentId()}/download");
    }

    /**
     * Delete the document by moving it to trash.
     *
     * @return bool True if the request was successful, false otherwise.
     */
    public function moveToTrash(): bool
    {
        return $this->delete("/documents/{$this->getDocumentId()}/delete")
            ->getResponse()->successful();
    }

    /**
     * Retrieve the signers of the document.
     *
     * This method sends a GET request to the endpoint for the specified document
     * and returns an array of signers associated with the document. If no signers
     * are found, it returns null.
     *
     * @return array|null An array of signers or null if no signers are found.
     */
    public function getSigner(): ?array
    {
        return $this->document['data']['attributes']['signers'];
    }

    public function getDocument(?string $documentId): self
    {

        $response = $this->get("/documents/{$documentId}")->getResponse();

        if (! $response->successful()) {

            $message = $response->json('data')['message'];

            throw new \Exception("Unable to fetch document details. Response body: $message");
        }

        $this->document = $response->json('data');

        return $this;
    }
}
