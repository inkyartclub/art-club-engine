<?php

namespace App\Jobs;

use App\Models\Nft;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Trustenterprises\LaravelHashgraph\LaravelHashgraph;
use Trustenterprises\LaravelHashgraph\Models\NFT\MintToken;

class MintNftCollection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    const MAX_BATCH_MINT = 10;
    const MAX_BATCH_MINT = 5;

    public String $mint_collection_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(String $mint_collection_id)
    {
        $this->mint_collection_id = $mint_collection_id;
    }

    function calculateTargetMintLoops($total) {
        if ($total <= self::MAX_BATCH_MINT) {
            return [ $total ];
        }

        $last_mint_amount = $total % self::MAX_BATCH_MINT;
        $base_loops = ($total - $last_mint_amount) / self::MAX_BATCH_MINT;
        $batch_arr = array_fill(0, $base_loops, self::MAX_BATCH_MINT);

        if (!!$last_mint_amount) {
            array_push($batch_arr, $last_mint_amount);
        }

        return $batch_arr;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $nft = Nft::find($this->mint_collection_id);

        $batch_amounts = $this->calculateTargetMintLoops($nft->total_to_mint);

        foreach ($batch_amounts as $amount) {
            $mintable = new MintToken(
                $nft->collection->token,
                $nft->metadata->generated_cid,
                $amount
            );

            $response = LaravelHashgraph::mintNonFungibleToken($mintable);

            $nft->total_minted += (int) $response->getAmount();
            $nft->save();
        }
    }
}
