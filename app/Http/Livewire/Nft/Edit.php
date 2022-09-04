<?php

namespace App\Http\Livewire\Nft;

use App\Models\Nft;
use Livewire\Component;

class Edit extends Component
{
    public Nft $nft;

    public function mount(Nft $nft)
    {
        $this->nft = $nft;
    }

    public function render()
    {
        return view('livewire.nft.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->nft->save();

        return redirect()->route('admin.nfts.index');
    }

    protected function rules(): array
    {
        return [
        ];
    }
}
