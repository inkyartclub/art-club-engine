<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Trustenterprises\LaravelHashgraph\LaravelHashgraph;
use Trustenterprises\LaravelHashgraph\Models\NFT\TransferNft;

class DistributePassesToWallet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pass:distribute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will attempt to distribute "n" passes to an associated wallet, for mass distribution, like a launchpad';

    /**
     * Execute the console command.
     *
     * @return int|void
     */
    public function handle()
    {
        $nft = $this->ask('Token id of the pass/NFT');
        $account = $this->ask('Receiver of the NFTs');
        $serial = $this->ask('Starting serial to start the process');
        $amount = $this->ask('Amount of NFTs to send in sequence');

        $last_nft_serial = $serial + $amount - 1;

        if(!$this->confirm('Confirm attempt transfer of ' . $amount . ' NFTs (Serial #' . $serial . ' to #'. $last_nft_serial .') of id ' . $nft . '  to ' . $account)) {
            return $this->error('Cancelled Transfer Attempt');
        }

        for ($i = $serial; $i < $last_nft_serial; $i++) {
            $payload = new TransferNft($nft, $account, $i);
            $response = LaravelHashgraph::transferNonFungibleToken($payload);

            if ($response->isSuccessful()) {
                $this->info('Status tx of #' . $i . ' - ' . $response->getTransactionId());
            }
        }

        return 0;
    }
}
