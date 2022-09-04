<?php

use App\Http\Controllers\Api\V1\Admin\ClaimApiController;
use App\Http\Controllers\Api\V1\Admin\CollectionApiController;
use App\Http\Controllers\Api\V1\Admin\MetadataApiController;
use App\Http\Controllers\Api\V1\Admin\NftApiController;
use App\Http\Controllers\Api\V1\Admin\PassApiController;

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
});
