<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckNftClaimStatus extends Controller
{
    /**
     * This is a get request to check the claiming state of a given pass id for the collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __invoke(Request $request)
    {
        abort_if(Gate::denies('claim_state'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serial_claims = Claim::only(['collection_id'])
            ->whereSerial($request->serial)
            ->whereNull('claimed_at')
            ->get();

        // Get all active claimable collections.
        $claimable_collections = Collection::only(['token'])
            ->whereNotNull('token')
            ->whereNotIn('token', $serial_claims)
            ->where('release_at', '<=', now())
            ->get();

        return [
            'claimable_count' =>  count($claimable_collections),
            'collection_ids' =>  $claimable_collections
        ];
    }
}
