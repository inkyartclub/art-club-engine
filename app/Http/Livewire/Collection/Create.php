<?php

namespace App\Http\Livewire\Collection;

use App\Jobs\CreateNftCollection;
use App\Models\Collection;
use App\Models\Pass;
use Livewire\Component;

class Create extends Component
{
    public Collection $collection;

    public array $listsForFields = [];

    public function mount(Collection $collection)
    {
        $this->collection              = $collection;
        $this->collection->supply      = '0';
        $this->collection->royalty_fee = '0.05';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.collection.create');
    }

    public function submit()
    {
        $this->validate();

        $this->collection->save();

        return redirect()->route('admin.collections.index');
    }

    protected function rules(): array
    {
        return [
            'collection.symbol' => [
                'string',
                'required',
            ],
            'collection.name' => [
                'string',
                'required',
            ],
            'collection.supply' => [
                'string',
                'nullable',
            ],
            'collection.royalty_fee' => [
                'numeric',
                'required',
            ],
            'collection.image_url' => [
                'string',
                'nullable',
            ],
            'collection.release_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'collection.pass_id' => [
                'integer',
                'exists:passes,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['pass'] = Pass::pluck('token', 'id')->toArray();
    }
}
