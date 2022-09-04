<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('collection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.collection.index');
    }

    public function create()
    {
        abort_if(Gate::denies('collection_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.collection.create');
    }

    public function edit(Collection $collection)
    {
        abort_if(Gate::denies('collection_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.collection.edit', compact('collection'));
    }

    public function show(Collection $collection)
    {
        abort_if(Gate::denies('collection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collection->load('pass', 'team');

        return view('admin.collection.show', compact('collection'));
    }
}
