<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePassRequest;
use App\Http\Requests\UpdatePassRequest;
use App\Http\Resources\Admin\PassResource;
use App\Models\Pass;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PassApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pass_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PassResource(Pass::with(['team'])->get());
    }

    public function store(StorePassRequest $request)
    {
        $pass = Pass::create($request->validated());

        return (new PassResource($pass))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pass $pass)
    {
        abort_if(Gate::denies('pass_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PassResource($pass->load(['team']));
    }

    public function update(UpdatePassRequest $request, Pass $pass)
    {
        $pass->update($request->validated());

        return (new PassResource($pass))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pass $pass)
    {
        abort_if(Gate::denies('pass_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pass->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
