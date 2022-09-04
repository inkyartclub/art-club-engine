<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMetadataRequest;
use App\Http\Requests\UpdateMetadataRequest;
use App\Http\Resources\Admin\MetadataResource;
use App\Models\Metadata;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MetadataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metadata_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetadataResource(Metadata::with(['team'])->get());
    }

    public function store(StoreMetadataRequest $request)
    {
        $metadata = Metadata::create($request->validated());

        return (new MetadataResource($metadata))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Metadata $metadata)
    {
        abort_if(Gate::denies('metadata_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetadataResource($metadata->load(['team']));
    }

    public function update(UpdateMetadataRequest $request, Metadata $metadata)
    {
        $metadata->update($request->validated());

        return (new MetadataResource($metadata))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Metadata $metadata)
    {
        abort_if(Gate::denies('metadata_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metadata->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
