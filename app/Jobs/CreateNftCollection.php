<?php

namespace App\Jobs;

use App\Models\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Trustenterprises\LaravelHashgraph\LaravelHashgraph;
use Trustenterprises\LaravelHashgraph\Models\NFT\NonFungibleToken;

class CreateNftCollection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public String $collection_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(String $collection_id)
    {
        $this->collection_id = $collection_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $create = Collection::find($this->collection_id);

        $nft = new NonFungibleToken($create->symbol, $create->name, $create->supply);

        $nft->setRoyaltyFee($create->royalty_fee);

        error_log(json_encode($nft->forNftRequest()));

        $minted_collection = LaravelHashgraph::createNonFungibleToken($nft);

        $create->token = $minted_collection->getTokenId();
        $create->save();
    }
}
