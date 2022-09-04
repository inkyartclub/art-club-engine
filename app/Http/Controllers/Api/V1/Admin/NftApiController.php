<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNftRequest;
use App\Http\Requests\UpdateNftRequest;
use App\Http\Resources\Admin\NftResource;
use App\Models\Nft;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NftApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nft_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NftResource(Nft::with(['collection', 'metadata', 'team'])->get());
    }

    public function store(StoreNftRequest $request)
    {
        $nft = Nft::create($request->validated());

        return (new NftResource($nft))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Nft $nft)
    {
        abort_if(Gate::denies('nft_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NftResource($nft->load(['collection', 'metadata', 'team']));
    }

    public function update(UpdateNftRequest $request, Nft $nft)
    {
        $nft->update($request->validated());

        return (new NftResource($nft))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Nft $nft)
    {
        abort_if(Gate::denies('nft_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nft->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
