<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('nft.collection_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="collection">{{ trans('cruds.nft.fields.collection') }}</label>
        <x-select-list class="form-control" required id="collection" name="collection" :options="$this->listsForFields['collection']" wire:model="nft.collection_id" />
        <div class="validation-message">
            {{ $errors->first('nft.collection_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nft.fields.collection_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nft.metadata_id') ? 'invalid' : '' }}">
        <label class="form-label" for="metadata">{{ trans('cruds.nft.fields.metadata') }}</label>
        <x-select-list class="form-control" id="metadata" name="metadata" :options="$this->listsForFields['metadata']" wire:model="nft.metadata_id" />
        <div class="validation-message">
            {{ $errors->first('nft.metadata_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nft.fields.metadata_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nft.total_to_mint') ? 'invalid' : '' }}">
        <label class="form-label" for="total_to_mint">{{ trans('cruds.nft.fields.total_to_mint') }}</label>
        <input class="form-control" type="number" name="total_to_mint" id="total_to_mint" wire:model.defer="nft.total_to_mint" step="1">
        <div class="validation-message">
            {{ $errors->first('nft.total_to_mint') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nft.fields.total_to_mint_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.nfts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>