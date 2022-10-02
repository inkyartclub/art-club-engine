<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

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
        abort_if(Gate::denies('claim_api'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serial_claims = Claim::where('serial', $request->serial)
            ->select(['collection_id', 'claimed_at'])
            ->whereNotNull('claimed_at')
            ->get();

        // Get all active claimable collections.
        // If we use this for multiple passes we would need to be more clever on checking the right pass and supply etc
        $claimable_collections = Collection::whereNotNull('token')
            ->select(['token', 'name'])
            ->whereNotIn('id', $serial_claims->map(fn ($coll) => $coll->collection_id))
            ->whereNotNull('pass_id')
            ->where('supply', 300)
            ->where('release_at', '<=', now())
            ->get();

        return [
            'claimable_count' => count($claimable_collections),
            'nfts' => $claimable_collections
        ];
    }
}
