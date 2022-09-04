<?php

namespace App\Http\Livewire\Pass;

use App\Models\Pass;
use Livewire\Component;

class Create extends Component
{
    public Pass $pass;

    public function mount(Pass $pass)
    {
        $this->pass         = $pass;
        $this->pass->supply = '0';
    }

    public function render()
    {
        return view('livewire.pass.create');
    }

    public function submit()
    {
        $this->validate();

        $this->pass->save();

        return redirect()->route('admin.passes.index');
    }

    protected function rules(): array
    {
        return [
            'pass.name' => [
                'string',
                'required',
            ],
            'pass.description' => [
                'string',
                'nullable',
            ],
            'pass.token' => [
                'string',
                'min:8',
                'required',
            ],
            'pass.supply' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
