<?php

use App\Http\Controllers\Api\V1\Admin\ClaimApiController;
use App\Http\Controllers\Api\V1\Admin\CollectionApiController;
use App\Http\Controllers\Api\V1\Admin\MetadataApiController;
use App\Http\Controllers\Api\V1\Admin\NftApiController;
use App\Http\Controllers\Api\V1\Admin\PassApiController;
use App\Http\Controllers\Api\V1\CheckNftClaimStatus;
use App\Http\Controllers\Api\V1\ClaimNftForSerial;
use App\Http\Controllers\Auth\GenerateTokenController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Pass
    Route::apiResource('passes', PassApiController::class);

    // Collection
    Route::apiResource('collections', CollectionApiController::class);

    // Metadata
    Route::apiResource('metadatas', MetadataApiController::class);

    // Nft
    Route::apiResource('nfts', NftApiController::class);

    // Claim
    Route::apiResource('claims', ClaimApiController::class, ['only' => ['index', 'show', 'destroy']]);

    // Check claim status
    Route::get('claim/{serial}/status', CheckNftClaimStatus::class);

    // Claim a given NFT for an account
    Route::post('nft/{nft_id}/serial/{serial}/account/{account}/claim', ClaimNftForSerial::class);
});

Route::post('/sanctum/token', GenerateTokenController::class);
