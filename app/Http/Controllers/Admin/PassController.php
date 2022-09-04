<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pass;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PassController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pass_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pass.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pass_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pass.create');
    }

    public function edit(Pass $pass)
    {
        abort_if(Gate::denies('pass_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pass.edit', compact('pass'));
    }

    public function show(Pass $pass)
    {
        abort_if(Gate::denies('pass_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pass->load('team');

        return view('admin.pass.show', compact('pass'));
    }
}
