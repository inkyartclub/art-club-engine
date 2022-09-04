@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.nft.title_singular') }}:
                    {{ trans('cruds.nft.fields.id') }}
                    {{ $nft->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.nft.fields.id') }}
                            </th>
                            <td>
                                {{ $nft->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nft.fields.collection') }}
                            </th>
                            <td>
                                @if($nft->collection)
                                    <span class="badge badge-relationship">{{ $nft->collection->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nft.fields.metadata') }}
                            </th>
                            <td>
                                @if($nft->metadata)
                                    <span class="badge badge-relationship">{{ $nft->metadata->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nft.fields.total_to_mint') }}
                            </th>
                            <td>
                                {{ $nft->total_to_mint }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nft.fields.total_minted') }}
                            </th>
                            <td>
                                {{ $nft->total_minted }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('nft_edit')
                    <a href="{{ route('admin.nfts.edit', $nft) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.nfts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection