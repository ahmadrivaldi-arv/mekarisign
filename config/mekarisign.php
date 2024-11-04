<?php

// config for Ahmdrv/MekariSign
return [

    /**
     * API endpoint mekari sign
     */
    'base_url' => env('MEKARISIGN_BASE_URL', 'https://sandbox-api.mekari.com/v2/esign/v1'),

    /**
     * API client id from [developers,sandbox].mekarisign.com
     */
    'client_id' => env('MEKARISIGN_CLIENT_ID'),

    /**
     * API client secret from [developers,sandbox].mekarisign.com
     */
    'client_secret' => env('MEKARISIGN_CLIENT_SECRET'),

    'template_id' => env('MEKARISIGN_TEMPLATE_ID'),
];
