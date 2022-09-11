<?php

return [

    /***
     * The pass supply of the project in question
     **/
    'pass_supply' => env('NFT_PASS_SUPPLY', 300),

    /***
     * The generated secret key that you have set for your serverless hashgraph client.
     **/
    'pass_token_id' => env('NFT_PASS_ID', '0.0.48219826'),

    /***
     * The webhook URL that can be configured to receive message events from your Serverless REST API.
     **/
    'webhook_route' => env('HASHGRAPH_WEBHOOK_ROUTE', '/hashgraph'),
];
