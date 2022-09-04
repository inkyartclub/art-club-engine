<?php

namespace App\Http\Livewire\Metadata;

use App\Models\Metadata;
use Livewire\Component;

class Edit extends Component
{
    public Metadata $metadata;

    public function mount(Metadata $metadata)
    {
        $this->metadata = $metadata;
    }

    public function render()
    {
        return view('livewire.metadata.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->metadata->save();

        return redirect()->route('admin.metadatas.index');
    }

    protected function rules(): array
    {
        return [
            'metadata.name' => [
                'string',
                'required',
            ],
            'metadata.creator' => [
                'string',
                'nullable',
            ],
            'metadata.description' => [
                'string',
                'nullable',
            ],
            'metadata.cid' => [
                'string',
                'required',
            ],
            'metadata.type' => [
                'string',
                'required',
            ],
        ];
    }
}
