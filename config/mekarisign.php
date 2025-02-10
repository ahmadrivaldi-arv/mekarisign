<?php

return [

    /**
     * The base URL for the MekariSign API.
     *
     * This configuration option sets the base URL for the MekariSign API.
     * It uses the `env` function to retrieve the value from the environment
     * variable `MEKARISIGN_BASE_URL`. If the environment variable is not set,
     * it defaults to 'https://sandbox-api.mekari.com/v2/esign/v1'.
     */
    'base_url' => env('MEKARISIGN_BASE_URL', 'https://sandbox-api.mekari.com/v2/esign/v1'),

    /**
     * Configuration file for MekariSign integration.
     *
     * This file contains the configuration settings for the MekariSign service.
     *
     * The client ID for the MekariSign service, retrieved from the environment variable 'MEKARISIGN_CLIENT_ID'.
     */
    'client_id' => env('MEKARISIGN_CLIENT_ID'),

    /**
     * The client secret for the MekariSign API.
     *
     * This value is retrieved from the environment configuration using the key 'MEKARISIGN_CLIENT_SECRET'.
     * Ensure that the environment variable is set correctly in your .env file.
     */
    'client_secret' => env('MEKARISIGN_CLIENT_SECRET'),

    /**
     * The client secret for the MekariSign service.
     *
     * This value is retrieved from the environment variable 'MEKARISIGN_CLIENT_SECRET'.
     * It is used to authenticate requests to the MekariSign API.
     */
    'template_id' => env('MEKARISIGN_TEMPLATE_ID'),

    /**
     * Configuration for MekariSign signer name.
     *
     * This value is retrieved from the environment variable 'MEKARISIGN_SIGNER_NAME'.
     * It is used to specify the name of the signer in the MekariSign service.
     */
    'signer_name' => env('MEKARISIGN_SIGNER_NAME'),

    /**
     * The email address of the signer.
     *
     * This configuration option retrieves the signer's email address from the environment
     * variable 'MEKARISIGN_SIGNER_EMAIL'. It is used to identify the signer in the MekariSign
     * service.
     */
    'signer_email' => env('MEKARISIGN_SIGNER_EMAIL'),

    /**
     * The callback URL for MekariSign.
     *
     * This URL is used by MekariSign to send callback requests to your application.
     * The value is retrieved from the environment variable 'MEKARISIGN_CALLBACK_URL'.
     */
    'callback_url' => env('MEKARISIGN_CALLBACK_URL'),
];
