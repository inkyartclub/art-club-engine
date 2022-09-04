<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('metadata.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.metadata.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="metadata.name">
        <div class="validation-message">
            {{ $errors->first('metadata.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.metadata.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('metadata.creator') ? 'invalid' : '' }}">
        <label class="form-label" for="creator">{{ trans('cruds.metadata.fields.creator') }}</label>
        <input class="form-control" type="text" name="creator" id="creator" wire:model.defer="metadata.creator">
        <div class="validation-message">
            {{ $errors->first('metadata.creator') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.metadata.fields.creator_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('metadata.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.metadata.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="metadata.description">
        <div class="validation-message">
            {{ $errors->first('metadata.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.metadata.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('metadata.cid') ? 'invalid' : '' }}">
        <label class="form-label required" for="cid">{{ trans('cruds.metadata.fields.cid') }}</label>
        <input class="form-control" type="text" name="cid" id="cid" required wire:model.defer="metadata.cid">
        <div class="validation-message">
            {{ $errors->first('metadata.cid') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.metadata.fields.cid_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('metadata.type') ? 'invalid' : '' }}">
        <label class="form-label required" for="type">{{ trans('cruds.metadata.fields.type') }}</label>
        <input class="form-control" type="text" name="type" id="type" required wire:model.defer="metadata.type">
        <div class="validation-message">
            {{ $errors->first('metadata.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.metadata.fields.type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.metadatas.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>