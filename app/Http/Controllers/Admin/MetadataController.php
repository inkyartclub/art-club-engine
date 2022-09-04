<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metadata;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MetadataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metadata_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metadata.index');
    }

    public function create()
    {
        abort_if(Gate::denies('metadata_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metadata.create');
    }

    public function edit(Metadata $metadata)
    {
        abort_if(Gate::denies('metadata_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metadata.edit', compact('metadata'));
    }

    public function show(Metadata $metadata)
    {
        abort_if(Gate::denies('metadata_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metadata->load('team');

        return view('admin.metadata.show', compact('metadata'));
    }
}
