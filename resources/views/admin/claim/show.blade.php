@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.claim.title_singular') }}:
                    {{ trans('cruds.claim.fields.id') }}
                    {{ $claim->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.claim.fields.id') }}
                            </th>
                            <td>
                                {{ $claim->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.claim.fields.serial') }}
                            </th>
                            <td>
                                {{ $claim->serial }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.claim.fields.collection') }}
                            </th>
                            <td>
                                @if($claim->collection)
                                    <span class="badge badge-relationship">{{ $claim->collection->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.claim.fields.claim_account') }}
                            </th>
                            <td>
                                {{ $claim->claim_account }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.claim.fields.claimed_at') }}
                            </th>
                            <td>
                                {{ $claim->claimed_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('claim_edit')
                    <a href="{{ route('admin.claims.edit', $claim) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.claims.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection