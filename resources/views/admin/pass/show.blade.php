@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.pass.title_singular') }}:
                    {{ trans('cruds.pass.fields.id') }}
                    {{ $pass->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.pass.fields.id') }}
                            </th>
                            <td>
                                {{ $pass->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pass.fields.name') }}
                            </th>
                            <td>
                                {{ $pass->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pass.fields.description') }}
                            </th>
                            <td>
                                {{ $pass->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pass.fields.token') }}
                            </th>
                            <td>
                                {{ $pass->token }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pass.fields.supply') }}
                            </th>
                            <td>
                                {{ $pass->supply }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('pass_edit')
                    <a href="{{ route('admin.passes.edit', $pass) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.passes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection