<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;
use Trustenterprises\LaravelHashgraph\LaravelHashgraph;
use Trustenterprises\LaravelHashgraph\Models\NFT\ClaimNft;

class ClaimNftForSerial extends Controller
{
    /**
     * This is a get request to check the claiming state of a given pass id for the collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __invoke(Request $request)
    {
        abort_if(Gate::denies('claim_api'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account_id = $request->account;
        $nft_id = $request->nft_id;
        $serial = $request->serial;

        $nft_collection = Collection::where('token', $nft_id)->first();

        abort_unless(!!$nft_collection, Response::HTTP_UNPROCESSABLE_ENTITY, 'NFT collection id not found');
        abort_unless(!!$nft_collection->pass, Response::HTTP_UNPROCESSABLE_ENTITY, 'Unable to process NFT with no pass');
        abort_if((int) $serial > $nft_collection->pass->supply, Response::HTTP_UNPROCESSABLE_ENTITY, "Supplied serial number for pass isn't right...");

        $pass_id = $nft_collection->pass->token;

        $claim = new ClaimNft($nft_id, $account_id, $pass_id, $serial);

        $claim_response = LaravelHashgraph::claimNonFungibleToken($claim);
        $errors = $claim_response->getErrors();

        abort_unless($claim_response->isSuccessful(), Response::HTTP_BAD_REQUEST, count($errors) ? $errors[0] : '');

        error_log(json_encode($claim_response->getTransactionId()));

        Claim::create([
            'serial' => $serial,
            'claim_account' => $account_id,
            'collection_id' => $nft_collection->id,
            'claimed_at' => now()
        ]);

        return [];
    }
}
