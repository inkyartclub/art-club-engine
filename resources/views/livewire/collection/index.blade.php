<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('collection_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Collection" format="csv" />
                <livewire:excel-export model="Collection" format="xlsx" />
                <livewire:excel-export model="Collection" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                <tr>
                    <th class="w-9">
                    </th>
                    <th class="w-28">
                        {{ trans('cruds.collection.fields.id') }}
                        @include('components.table.sort', ['field' => 'id'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.symbol') }}
                        @include('components.table.sort', ['field' => 'symbol'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.name') }}
                        @include('components.table.sort', ['field' => 'name'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.supply') }}
                        @include('components.table.sort', ['field' => 'supply'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.royalty_fee') }}
                        @include('components.table.sort', ['field' => 'royalty_fee'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.token') }}
                        @include('components.table.sort', ['field' => 'token'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.image_url') }}
                        @include('components.table.sort', ['field' => 'image_url'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.release_at') }}
                        @include('components.table.sort', ['field' => 'release_at'])
                    </th>
                    <th>
                        {{ trans('cruds.collection.fields.pass') }}
                        @include('components.table.sort', ['field' => 'pass.token'])
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($collections as $collection)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $collection->id }}" wire:model="selected">
         §               </td>
                        <td>
                            {{ $collection->id }}
                        </td>
                        <td>
                            {{ $collection->symbol }}
                        </td>
                        <td>
                            {{ $collection->name }}
                        </td>
                        <td>
                            {{ $collection->supply }}
                        </td>
                        <td>
                            {{ $collection->royalty_fee }}
                        </td>
                        <td>
                            {{ $collection->token }}
                        </td>
                        <td>
                            {{ $collection->image_url }}
                        </td>
                        <td>
                            {{ $collection->release_at }}
                        </td>
                        <td>
                            @if($collection->pass)
                                <span class="badge badge-relationship">{{ $collection->pass->token ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex justify-end">
                                @can('collection_show')
                                    <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.collections.show', $collection) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('collection_edit')
                                    <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.collections.edit', $collection) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('collection_delete')
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $collection->id }})" wire:loading.attr="disabled">
                                        {{ trans('global.delete') }}
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No entries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $collections->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("{{ trans('global.areYouSure') }}")) {
                return
            }
        @this[e.callback](...e.argv)
        })
    </script>
@endpush
