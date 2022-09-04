<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nft;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NftController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nft_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nft.index');
    }

    public function create()
    {
        abort_if(Gate::denies('nft_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nft.create');
    }

    public function edit(Nft $nft)
    {
        abort_if(Gate::denies('nft_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nft.edit', compact('nft'));
    }

    public function show(Nft $nft)
    {
        abort_if(Gate::denies('nft_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nft->load('collection', 'metadata', 'team');

        return view('admin.nft.show', compact('nft'));
    }
}
