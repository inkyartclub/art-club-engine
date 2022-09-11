<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Http\Resources\Admin\CollectionResource;
use App\Models\Collection;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollectionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('collection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollectionResource(Collection::with(['pass', 'team'])->get());
    }

    public function store(StoreCollectionRequest $request)
    {
        $collection = Collection::create($request->validated());

        return (new CollectionResource($collection))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Collection $collection)
    {
        abort_if(Gate::denies('collection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollectionResource($collection->load(['pass', 'team']));
    }

    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $collection->update($request->validated());

        return (new CollectionResource($collection))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Collection $collection)
    {
        abort_if(Gate::denies('collection_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collection->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
