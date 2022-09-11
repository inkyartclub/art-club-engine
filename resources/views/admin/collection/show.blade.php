@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.collection.title_singular') }}:
                    {{ trans('cruds.collection.fields.id') }}
                    {{ $collection->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.id') }}
                            </th>
                            <td>
                                {{ $collection->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.symbol') }}
                            </th>
                            <td>
                                {{ $collection->symbol }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.name') }}
                            </th>
                            <td>
                                {{ $collection->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.supply') }}
                            </th>
                            <td>
                                {{ $collection->supply }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.royalty_fee') }}
                            </th>
                            <td>
                                {{ $collection->royalty_fee }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.token') }}
                            </th>
                            <td>
                                {{ $collection->token }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.image_url') }}
                            </th>
                            <td>
                                {{ $collection->image_url }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.release_at') }}
                            </th>
                            <td>
                                {{ $collection->release_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.collection.fields.pass') }}
                            </th>
                            <td>
                                @if($collection->pass)
                                    <span class="badge badge-relationship">{{ $collection->pass->token ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('collection_edit')
                    <a href="{{ route('admin.collections.edit', $collection) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection