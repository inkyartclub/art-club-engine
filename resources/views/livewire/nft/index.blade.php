<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('nft_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Nft" format="csv" />
                <livewire:excel-export model="Nft" format="xlsx" />
                <livewire:excel-export model="Nft" format="pdf" />
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
                            {{ trans('cruds.nft.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.nft.fields.collection') }}
                            @include('components.table.sort', ['field' => 'collection.name'])
                        </th>
                        <th>
                            {{ trans('cruds.collection.fields.symbol') }}
                            @include('components.table.sort', ['field' => 'collection.symbol'])
                        </th>
                        <th>
                            {{ trans('cruds.nft.fields.metadata') }}
                            @include('components.table.sort', ['field' => 'metadata.name'])
                        </th>
                        <th>
                            {{ trans('cruds.metadata.fields.cid') }}
                            @include('components.table.sort', ['field' => 'metadata.cid'])
                        </th>
                        <th>
                            {{ trans('cruds.nft.fields.total_to_mint') }}
                            @include('components.table.sort', ['field' => 'total_to_mint'])
                        </th>
                        <th>
                            {{ trans('cruds.nft.fields.total_minted') }}
                            @include('components.table.sort', ['field' => 'total_minted'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nfts as $nft)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $nft->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $nft->id }}
                            </td>
                            <td>
                                @if($nft->collection)
                                    <span class="badge badge-relationship">{{ $nft->collection->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($nft->collection)
                                    {{ $nft->collection->symbol ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($nft->metadata)
                                    <span class="badge badge-relationship">{{ $nft->metadata->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($nft->metadata)
                                    {{ $nft->metadata->cid ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $nft->total_to_mint }}
                            </td>
                            <td>
                                {{ $nft->total_minted }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('nft_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.nfts.show', $nft) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('nft_edit_hide')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.nfts.edit', $nft) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('nft_delete')
                                        @if(!!!$nft->total_minted)
                                            <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $nft->id }})" wire:loading.attr="disabled">
                                                {{ trans('global.delete') }}
                                            </button>
                                        @endif
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
            {{ $nfts->links() }}
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
