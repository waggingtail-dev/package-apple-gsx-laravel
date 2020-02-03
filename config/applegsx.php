<?php

return [
    /*
     * ----------------------------------------------------------------------
     * X-Apple-SoldTo
     * ----------------------------------------------------------------------
     *
     * This value is required for communicating with the api.
     */
    'sold_to' => env('APPLE_GSX_SOLD_TO'),

    /*
     * ----------------------------------------------------------------------
     * X-Apple-ShipTo
     * ----------------------------------------------------------------------
     *
     * This value is required for communicating with the api.
     */
    'ship_to' => env('APPLE_GSX_SHIP_TO'),

    /*
     * ----------------------------------------------------------------------
     * Client Certificate
     * ----------------------------------------------------------------------
     *
     * This should be a path to the client certificate.
     */
    'ca_bundle_path' => env('APPLE_GSX_CA_BUNDLE_PATH'),

    /*
     * ----------------------------------------------------------------------
     * Client Certificate Passphrase
     * ----------------------------------------------------------------------
     *
     * If you have encrypted the client certificate with a passphrase,
     * (which is recommended).
     */
    'pass_phrase' => env('APPLE_GSX_CA_PASS_PHRASE'),

    /*
     * ----------------------------------------------------------------------
     * Use UAT environment
     * ----------------------------------------------------------------------
     *
     * Apple GSX has two environments, UAT and PROD, setting this to true,
     * will change api endpoint to the UAT environment.
     *
     * (use this in development).
     */
    'use_uat' => env('APPLE_GSX_USE_UAT', false),
];