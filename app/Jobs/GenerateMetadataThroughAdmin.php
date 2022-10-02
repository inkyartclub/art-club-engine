<?php

namespace App\Jobs;

use App\Models\Metadata;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Trustenterprises\LaravelHashgraph\LaravelHashgraph;
use Trustenterprises\LaravelHashgraph\Models\NFT\NftMetadata;

class GenerateMetadataThroughAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public String $metadata_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(String $metadata_id)
    {
        $this->metadata_id = $metadata_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $metadata = Metadata::find($this->metadata_id);

        $formatted = [
            "name" => $metadata->name,
            "creator" => $metadata->creator,
            "description" => $metadata->description,
            "type" => $metadata->type,
            "image" => 'ipfs://' . $metadata->cid
        ];

        $nft_meta = new NftMetadata($formatted);

        $generated = LaravelHashgraph::generateMetadataForNft($nft_meta);
//
        if (!$generated->isSuccessful()) {
            throw new \Error('failed to generate metadata');
        }

        $metadata->generated_cid = $generated->getCid();
        $metadata->save();
    }
}
