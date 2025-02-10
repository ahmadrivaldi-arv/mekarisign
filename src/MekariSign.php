<?php

namespace Ahmdrv\MekariSign;

use Ahmdrv\MekariSign\Concerns\WithRequestMethod;
use Ahmdrv\MekariSign\Services\DocumentRequest;
use Exception;
use Illuminate\Http\Client\Response;

class MekariSign
{
    use WithRequestMethod;

    /**
     * Sends a request for PSRE auto sign.
     *
     * This method sends a request to the PSRE auto sign endpoint with the provided document request data.
     * The document request can be either an array or an instance of DocumentRequest.
     *
     * @param  array|DocumentRequest  $documentRequest  The document request data.
     * @return Response|MekariSign The response from the PSRE auto sign request.
     */
    public function requestPsreSign(array|DocumentRequest $documentRequest): Response|MekariSign
    {
        $data = is_array($documentRequest) ? $documentRequest : $documentRequest->toArray();

        $response = $this->post('/psre_auto_sign/request_psre_auto_sign', $data);

        return $response;
    }

    /**
     * Request activation for AutoSign feature.
     *
     * This method sends a POST request to activate the AutoSign feature for the given email.
     * If the request is successful, it returns the authentication URL.
     * If there is an error in the response, it throws an exception with the error details.
     *
     * @param  string  $email  The email address to activate AutoSign for.
     * @return string|null The authentication URL if the request is successful, or null if not.
     *
     * @throws Exception If there is an error in the response.
     */
    public function requestActivateAutoSign(string $email): ?string
    {
        $response = $this->post('/psre_auto_sign/activate', [
            'email' => $email,
        ])->getResponse()->json();

        if (isset($response['error']) && $response['error'] === true) {

            $error = collect($response)->__toString();

            throw new Exception("Request error: $error");
        }

        if (isset($response['auth_url'])) {
            return $response['auth_url'];
        }

        return null;

    }

    /**
     * Download a document by its ID.
     *
     * @param  string  $id  The ID of the document to download.
     * @return mixed The response from the download request.
     */
    public function download(string $id)
    {
        $response = $this->get("/documents/$id/download");

        return $response;
    }
}
