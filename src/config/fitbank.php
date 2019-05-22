<?php

return [
    'partner_id'        => env('FITBANK_PARTNER_ID', null),
    'business_unit_id'  => env('BUSINESS_UNIT_ID', null),
    'market_place_id'   => env('MARKET_PLACE_ID', null),
    'username'          => env('FITBANK_USERNAME', null),
    'password'          => env('FITBANK_PASSWORD', null),
    'sandbox'           => env('FITBANK_SANDBOX', true),
    'timeout'           => 30
];
