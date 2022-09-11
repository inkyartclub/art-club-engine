<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('collection.symbol') ? 'invalid' : '' }}">
        <label class="form-label required" for="symbol">{{ trans('cruds.collection.fields.symbol') }}</label>
        <input class="form-control" type="text" name="symbol" id="symbol" required wire:model.defer="collection.symbol">
        <div class="validation-message">
            {{ $errors->first('collection.symbol') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.symbol_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.collection.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="collection.name">
        <div class="validation-message">
            {{ $errors->first('collection.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.royalty_fee') ? 'invalid' : '' }}">
        <label class="form-label required" for="royalty_fee">{{ trans('cruds.collection.fields.royalty_fee') }}</label>
        <input class="form-control" type="number" name="royalty_fee" id="royalty_fee" required wire:model.defer="collection.royalty_fee" step="0.01">
        <div class="validation-message">
            {{ $errors->first('collection.royalty_fee') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.royalty_fee_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.image_url') ? 'invalid' : '' }}">
        <label class="form-label" for="image_url">{{ trans('cruds.collection.fields.image_url') }}</label>
        <input class="form-control" type="text" name="image_url" id="image_url" wire:model.defer="collection.image_url">
        <div class="validation-message">
            {{ $errors->first('collection.image_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.image_url_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.release_at') ? 'invalid' : '' }}">
        <label class="form-label required" for="release_at">{{ trans('cruds.collection.fields.release_at') }}</label>
        <x-date-picker class="form-control" required wire:model="collection.release_at" id="release_at" name="release_at" />
        <div class="validation-message">
            {{ $errors->first('collection.release_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.release_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.pass_id') ? 'invalid' : '' }}">
        <label class="form-label" for="pass">{{ trans('cruds.collection.fields.pass') }}</label>
        <x-select-list class="form-control" id="pass" name="pass" :options="$this->listsForFields['pass']" wire:model="collection.pass_id" />
        <div class="validation-message">
            {{ $errors->first('collection.pass_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.pass_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>