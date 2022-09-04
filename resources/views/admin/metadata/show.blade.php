@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.metadata.title_singular') }}:
                    {{ trans('cruds.metadata.fields.id') }}
                    {{ $metadata->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.id') }}
                            </th>
                            <td>
                                {{ $metadata->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.name') }}
                            </th>
                            <td>
                                {{ $metadata->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.creator') }}
                            </th>
                            <td>
                                {{ $metadata->creator }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.description') }}
                            </th>
                            <td>
                                {{ $metadata->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.cid') }}
                            </th>
                            <td>
                                {{ $metadata->cid }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.type') }}
                            </th>
                            <td>
                                {{ $metadata->type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.metadata.fields.generated_cid') }}
                            </th>
                            <td>
                                {{ $metadata->generated_cid }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('metadata_edit')
                    <a href="{{ route('admin.metadatas.edit', $metadata) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.metadatas.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection