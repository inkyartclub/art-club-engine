<?php

namespace App\Http\Livewire\Metadata;

use App\Jobs\GenerateMetadataThroughAdmin;
use App\Models\Metadata;
use Livewire\Component;

class Create extends Component
{
    public Metadata $metadata;

    public function mount(Metadata $metadata)
    {
        $this->metadata       = $metadata;
        $this->metadata->type = 'image/png';
    }

    public function render()
    {
        return view('livewire.metadata.create');
    }

    public function submit()
    {
        $this->validate();

        $this->metadata->save();

//        GenerateMetadataThroughAdmin::dispatch($this->metadata->id);

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
