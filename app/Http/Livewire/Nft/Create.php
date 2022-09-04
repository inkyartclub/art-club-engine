<?php

namespace App\Http\Livewire\Nft;

use App\Models\Collection;
use App\Models\Metadata;
use App\Models\Nft;
use Livewire\Component;

class Create extends Component
{
    public Nft $nft;

    public array $listsForFields = [];

    public function mount(Nft $nft)
    {
        $this->nft = $nft;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.nft.create');
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
            'nft.collection_id' => [
                'integer',
                'exists:collections,id',
                'required',
            ],
            'nft.metadata_id' => [
                'integer',
                'exists:metadatas,id',
                'nullable',
            ],
            'nft.total_to_mint' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['collection'] = Collection::pluck('name', 'id')->toArray();
        $this->listsForFields['metadata']   = Metadata::pluck('name', 'id')->toArray();
    }
}
