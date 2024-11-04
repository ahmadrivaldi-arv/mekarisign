<?php

namespace Ahmdrv\MekariSign;

use Ahmdrv\MekariSign\Concerns\ResponseBag;
use Ahmdrv\MekariSign\Concerns\WithRequestMethod;
use Illuminate\Http\Client\Response;

class MekariSign
{
    use WithRequestMethod;

    /**
     * @param array $data
     *
     * @return Response
     */
    public function requestPsreSign(array $data): Response|MekariSign
    {
        $response = $this->post("/psre_auto_sign/request_psre_auto_sign", $data);

        return $response;
    }
}
