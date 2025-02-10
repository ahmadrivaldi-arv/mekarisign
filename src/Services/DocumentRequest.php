<?php

namespace Ahmdrv\MekariSign\Services;

/**
 * Class DocumentRequest
 *
 * This class is responsible for handling document requests.
 *
 * @package Ahmdrv\MekariSign\Services
 */
class DocumentRequest
{
    /**
     * @var string The name of the document.
     */
    protected string $documentName = '';

    /**
     * @var string The ID of the template.
     */
    protected string $templateId = '';

    /**
     * @var string The callback URL.
     */
    protected string $callbackUrl = '';

    /**
     * @var string The base64 pdf content.
     */
    protected string $content = '';

    /**
     * @var array $signers
     *
     * An array that holds the list of signers for the document request.
     */
    protected array $signers = [];

    /**
     * DocumentRequest constructor.
     *
     * @param string|null $documentName The name of the document.
     */
    public function __construct(string $documentName = null)
    {
        $this->documentName = $documentName;
    }


    /**
     * Create a new DocumentRequest instance.
     *
     * @param string $documentName The name of the document.
     * @return static
     */
    public static function make(string $documentName): static
    {
        return new static($documentName);
    }

    /**
     * Sets the content for the document request.
     *
     * @param string $content The content to be set, encoded as a base64 string representing a PDF.
     * @return static Returns the current instance for method chaining.
     */
    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the template ID.
     *
     * @param string $templateId The ID of the template.
     * @return static
     */
    public function setTemplate(string $templateId): static
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Set the callback URL.
     *
     * @param string|null $url The callback URL.
     * @return static
     */
    public function setCallbackUrl(?string $url): static
    {
        $this->callbackUrl = $url ?? config('mekarisign.callback_url');

        return $this;
    }

    public function addSigner(Signer $signer): static
    {
        $this->signers[] = $signer->toArray();

        return $this;
    }

    /**
     * Convert the DocumentRequest instance to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'doc' => $this->content,
            'filename' => $this->documentName,
            'template_id' => $this->templateId,
            'callback_url' => $this->callbackUrl,
            'signers' => $this->signers
        ];
    }
}
