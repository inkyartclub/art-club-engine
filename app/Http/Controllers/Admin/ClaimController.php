<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClaimController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('claim_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.claim.index');
    }

    public function show(Claim $claim)
    {
        abort_if(Gate::denies('claim_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $claim->load('collection', 'team');

        return view('admin.claim.show', compact('claim'));
    }
}
