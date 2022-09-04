<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('pass.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.pass.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="pass.name">
        <div class="validation-message">
            {{ $errors->first('pass.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pass.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pass.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.pass.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="pass.description">
        <div class="validation-message">
            {{ $errors->first('pass.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pass.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pass.token') ? 'invalid' : '' }}">
        <label class="form-label required" for="token">{{ trans('cruds.pass.fields.token') }}</label>
        <input class="form-control" type="text" name="token" id="token" required wire:model.defer="pass.token">
        <div class="validation-message">
            {{ $errors->first('pass.token') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pass.fields.token_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pass.supply') ? 'invalid' : '' }}">
        <label class="form-label required" for="supply">{{ trans('cruds.pass.fields.supply') }}</label>
        <input class="form-control" type="number" name="supply" id="supply" required wire:model.defer="pass.supply" step="1">
        <div class="validation-message">
            {{ $errors->first('pass.supply') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pass.fields.supply_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.passes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>